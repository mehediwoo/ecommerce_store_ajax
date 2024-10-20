<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\admin_auth;

class AdminAuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admin_auth::create([
            'name'=>'Mehedi Hasan',
            'email'=>'mehedilrs@gmail.com',
            'password'=>Hash::make('12345'),
        ]);
    }
}
