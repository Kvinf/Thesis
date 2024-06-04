<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $id = Str::uuid();

        $hashed = Hash::make('test123');


        DB::table('ms_users')->insert([
            'id' => $id,
            'email' => 'kevinkuandinata6@gmail.com',
            'password' => $hashed,
            'verified' => 1,
            'username' => 'Kevin'
        ]);

        $id = Str::uuid();

        DB::table('ms_users')->insert([
            'id' => $id,
            'email' => 'jonastheon7@gmail.com',
            'password' => $hashed,
            'verified' => 1,
            'username' => 'Jonas'
        ]);
    }
}
