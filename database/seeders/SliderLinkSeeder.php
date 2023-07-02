<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class SliderLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Link::create([
            'title' => 'Slider',
            'as' => 'Slider',
            'to' => 'admin.sliders.index',
            'icon' => 'fas fa-camera',
            'permission_title' => 'access_slider',
            'status' => true,
        ]);
    }
}
