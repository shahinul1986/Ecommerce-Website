<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'title' => 'Adidas',
            'slug' => 'adidas',
            'is_active' => false
        ]);

        Brand::create([
            'title' => 'Nike',
            'slug' => 'nike',
            'is_active' => false
        ]);

        Brand::create([
            'title' => 'Puma',
            'slug' => 'puma',
            'is_active' => false
        ]);

        Brand::create([
            'title' => 'Toomy Hilfigure',
            'slug' => 'tomy-hilfigure',
            'is_active' => false
        ]);
    }
}
