<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        footer::create([
            'logo'=>'Limupa Store',
            'phone' => '+880 1518-912417,+880 1759-199373',
            'email' => 'limupa_stores@mail.com,sells@mail.com',
            'address' => '17 Princess Road, London , Grester London NW18JR, UK',
            'copyright' => 'Copyright ©2024 All rights reserved | This template is develop  by Mehedi Hasan',
        ]);
    }
}
