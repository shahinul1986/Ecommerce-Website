<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'name' => 'Dhaka'
        ]);
        District::create([
            'name' => 'Chittagong'
        ]);
        District::create([
            'name' => 'Rajshahi'
        ]);
        District::create([
            'name' => 'Khulna'
        ]);
        District::create([
            'name' => 'Barishal'
        ]);
        District::create([
            'name' => 'Sylhet'
        ]);
    }
}
