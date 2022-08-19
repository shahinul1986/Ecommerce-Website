<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'title' => 'White',
            'color_code'  => '#ffffff'
        ]);

        Color::create([
            'title' => 'Black',
            'color_code'  => '#000000'
        ]);

        Color::create([
            'title' => 'Red',
            'color_code'  => '#ff0000'
        ]);

        Color::create([
            'title' => 'Blue',
            'color_code'  => '#0000ff'
        ]);

        Color::create([
            'title' => 'Green',
            'color_code'  => '#00ff00'
        ]);
    }
}
