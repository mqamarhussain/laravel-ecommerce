<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingNewKeysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create(['display_name' => 'Site Logo', 'key' => 'site_logo', 'value' => 'default.png', 'type' => 'image', 'section' => 'General']);

        Setting::create(['display_name' => 'Facebook Link', 'key' => 'fb_link', 'value' => 'https://www.facebook.com/', 'type' => 'text', 'section' => 'Social account']);
        Setting::create(['display_name' => 'Instagram Link', 'key' => 'fb_link', 'value' => 'https://www.insta.com/', 'type' => 'text', 'section' => 'Social account']);
        Setting::create(['display_name' => 'Youtube Link', 'key' => 'fb_link', 'value' => 'https://www.youtube.com/', 'type' => 'text', 'section' => 'Social account']);

    }
}
