<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Kids',
            'slug' => 'kids',
            'description' => 'All Kids Collections'
        ]);

        Category::create([
            'title' => 'Mens',
            'slug' => 'mens',
            'description' => 'All Mens Collections'
        ]);

        Category::create([
            'title' => 'Womens',
            'slug' => 'womens',
            'description' => 'All Womens Collections'
        ]);
    }
}
