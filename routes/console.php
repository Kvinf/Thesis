<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\APIList;
use App\Models\APICategory;
use App\Models\Project;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::call(function () {
    DB::beginTransaction();

    try 
    {
        $projects = Project::get();

        foreach ($projects as $project) {
            $apilist = APIList::where("projectId", $project->id)->get();
            $authToken = "";
            foreach ($apilist as $api) {
                $auth = APICategory::where("id", $api->categoryId)->first();
                if ($auth->categoryName != null && $auth->categoryName == "Authentication") {
                    $options = [
                        'headers' => $auth->header,
                        'json' => $auth->body,
                    ];
    
                    $url = $api->url;
    
                    switch (strtoupper($api->method)) {
                        case 'POST':
                            $response = Http::withHeaders($options['headers'])->post($url, $options['json']);
                            break;
                        case 'PUT':
                            $response = Http::withHeaders($options['headers'])->put($url, $options['json']);
                            break;
                        case 'PATCH':
                            $response = Http::withHeaders($options['headers'])->patch($url, $options['json']);
                            break;
                        case 'DELETE':
                            $response = Http::withHeaders($options['headers'])->delete($url, $options['json']);
                            break;
                        default: // GET
                            $response = Http::withHeaders($options['headers'])->get($url, $options['json']);
                            break;
                    }
    
                    if ($response->successful()) {
                        $data = $response->json();
                        $authToken = $data->access_token;
                    }
                }
            }
            foreach ($apilist as $api) {
    
                $url = $api->url;
    
                $headers = [];
    
                if ($authToken != "") {
                    if (!empty($api->header)) {
                        $headers = $this->sanitizeAndDecodeJson($api->header, 'header');
                        foreach ($headers as $key => $value) {
                            if (is_string($value) && strpos($value, '${access_token}') !== false) {
                                $headers[$key] = str_replace('${access_token}', $authToken, $value);
                            }
                        }
                    }
                } else {
                    if (!empty($api->header)) {
                        $headers = $this->sanitizeAndDecodeJson($api->header, 'header');
                    }
                }
    
                $body = [];
    
                $options = [
                    'headers' => $headers,
                    'json' => $body,
                ];
    
                if (!empty($api->body)) {
                    $body = $this->sanitizeAndDecodeJson($api->body, 'body');
                }
    
                switch (strtoupper($api->method)) {
                    case 'POST':
                        $response = Http::withHeaders($options['headers'])->post($url, $options['json']);
                        break;
                    case 'PUT':
                        $response = Http::withHeaders($options['headers'])->put($url, $options['json']);
                        break;
                    case 'PATCH':
                        $response = Http::withHeaders($options['headers'])->patch($url, $options['json']);
                        break;
                    case 'DELETE':
                        $response = Http::withHeaders($options['headers'])->delete($url, $options['json']);
                        break;
                    default: // GET
                        $response = Http::withHeaders($options['headers'])->get($url, $options['json']);
                }
    
                if ($response->successful()) {
                    $data = $response->json();
                    $api->update([
                        "response" => $data
                    ]);
                }
            }
        }

        DB::commit();
    } catch (Exception $ex) {
        DB::rollback();
    }
    
})->everyFifteenMinutes();
