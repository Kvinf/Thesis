<?php

namespace App\Http\Controllers;

use App\Models\APIList;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAPIListRequest;
use App\Http\Requests\UpdateAPIListRequest;
use App\Models\APICategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\error;

class APIListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAPIListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(APIList $aPIList)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(APIList $aPIList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAPIListRequest $request, APIList $aPIList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(APIList $aPIList)
    {
        //
    }

    public function addApi(Request $request)
    {

        $request->merge(['authorization' => $request->has('authorization')]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'method' => 'required|string|in:GET,POST,PUT,PATCH,DELETE',
            'description' => 'required|string',
            'authorization' => 'nullable|boolean',
            'header' => 'nullable|string',
            'body' => 'nullable|string',
            'result' => 'required|string',
            'projectId' => 'required',
            'categoryId' => 'nullable'
        ]);

        try {
            DB::beginTransaction();

            if ($validated['categoryId'] == "") {
                $validated['categoryId'] = null;
            }

            $resultDecode = json_decode($validated['result'], true);


            $category = APICategory::where('id', $validated['categoryId'])->first();

            if ($validated['authorization'] == null) {
                $validated['authorization'] = false;
            } else {
                if ($validated['authorization'] == true) {
                    if ($category && $category->categoryName == "Authentication") {
                        $item = APIList::where('categoryId', $validated['categoryId'])->first();
                        if ($item) {
                            return back()->withErrors("Authentication API already exist");
                        }
                    }
                }
            }

            if ($category && $category->categoryName == "Authentication") {
                if (!isset($resultDecode['accessToken'])) {
                    return back()->withErrors("Authentication need to have accessToken result");
                }
            }

            APIList::create($validated);
            DB::commit();
            return redirect()->route("project", ['id' => $validated['projectId']]);
        } catch (Exception $ex) {
            error_log($ex);
            return back();
            DB::rollBack();
        }
    }


    public function showAddApiForm($id, Request $request)
    {
        $success = $request->query('success');
        $fail = $request->query('fail');
        $input = $request->query('input');

        $category = APICategory::where('projectId', $id)->get();

        $authCheck = APICategory::where('projectId', $id)->where('categoryName', 'Authentication')->first();


        $authCheck = APIList::where('categoryId', $authCheck->id)->first();

        return view('addapi')->with([
            'projectId' => $id,
            'success' => $success ? json_encode($success, JSON_PRETTY_PRINT) : null,
            'fail' => $fail ? json_encode($fail, JSON_PRETTY_PRINT) : null,
            'input' => $input ? $input : null,
            'category' => $category,
            'authCheck' => $authCheck ? true : false
        ]);
    }

    public function showEditApiForm($id, Request $request, $init)
    {
        $success = $request->query('success');
        $fail = $request->query('fail');
        $input = $request->query('input');

        $category = APICategory::where('projectId', $id)->get();

        $authCheck = APICategory::where('projectId', $id)->where('categoryName', 'Authentication')->first();


        $authCheck = APIList::where('categoryId', $authCheck->id)->first();

        return view('addapi')->with([
            'projectId' => $id,
            'success' => $success && $init == false ? json_encode($success, JSON_PRETTY_PRINT) : null,
            'fail' => $fail ? json_encode($fail, JSON_PRETTY_PRINT) : null,
            'input' => $input ? $input : null,
            'category' => $category,
            'authCheck' => $authCheck ? true : false
        ]);
    }

    public function testApi(Request $request)
    {
        // Validate the request input
        $validated = $request->validate([
            'projectId' => 'required',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'method' => 'required|string|in:GET,POST,PUT,PATCH,DELETE',
            'description' => 'required|string',
            'authorization' => 'nullable|boolean',
            'header' => 'nullable|string',
            'body' => 'nullable|string',
        ]);

        $url = $validated['url'];

        $headers = [];
        if (!empty($validated['header'])) {
            $headers = $this->sanitizeAndDecodeJson($validated['header'], 'header');
            if (is_null($headers)) {
                return back()->withErrors(['header' => 'The header must be a valid JSON string.'])->withInput();
            }
        }

        $body = [];
        if (!empty($validated['body'])) {
            $body = $this->sanitizeAndDecodeJson($validated['body'], 'body');
            if (is_null($body)) {
                return back()->withErrors(['body' => 'The body must be a valid JSON string.'])->withInput();
            }
        }
        $options = [
            'headers' => $headers,
            'json' => $body,
        ];

        switch (strtoupper($validated['method'])) {
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
            return redirect()->route('addapi', [
                'id' => $validated['projectId'],
                'success' => $data,
                'input' => $validated
            ]);
        } else {
            $data = $response->json();
            return redirect()->route('addapi', [
                'id' => $validated['projectId'],
                'fail' => $data,
                'input' => $validated
            ]);
        }
    }

    private function sanitizeAndDecodeJson($json, $field)
    {
        try {
            $decoded = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
            // Sanitize the JSON data
            $sanitized = $this->sanitizeArray($decoded);
        } catch (\JsonException $e) {
            return null;
        }
        return $sanitized;
    }

    private function sanitizeArray(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->sanitizeArray($value); // Recursive call for nested arrays
            } else {
                $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
        }
        return $data;
    }
}
