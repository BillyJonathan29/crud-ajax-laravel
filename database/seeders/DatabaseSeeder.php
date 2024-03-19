<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Database\Factories\productFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\pegawai::factory(20)->create();
        \App\Models\Product::factory(20)->create();

        DB::table('users')->insert([
            'name'=>'billy jonathan',
            'username' => 'billy',
            'email'=>'email1@gmail.com',
            'password'=>Hash::make('123456')
        ]);

    }
}
