<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'title' => 'Extra Large'
        ]);

        Size::create([
            'title' => 'Large'
        ]);

        Size::create([
            'title' => 'Medium'
        ]);

        Size::create([
            'title' => 'Small'
        ]);

        Size::create([
            'title' => 'Extra Small'
        ]);
    }
}
