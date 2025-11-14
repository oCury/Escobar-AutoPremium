<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
    Brand::create(['name' => 'Toyota']);
    Brand::create(['name' => 'Honda']);
    Brand::create(['name' => 'Volkswagen']);
}
}