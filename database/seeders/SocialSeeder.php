<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        social::create([
            'facebook'=>'https://www.facebook.com/mehediwoo',
            'twitter'=>'https://twitter.com/Mehediwoo',
            'instagram'=>'https://instagram.com/Mehediwoo',
            'tiktok'=>'https://tiktok.com/',
            'linkedin'=>'https://linkedin.com/Mehediwoo',
            'youtube'=>'https://youtube.com/Mehediwoo',
            'google'=>'https://google.com/Mehediwoo',
        ]);
    }
}
