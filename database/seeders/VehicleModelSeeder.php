<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleModel;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleModel::create(['brand_id' => 1, 'name' => 'Corolla']);
        VehicleModel::create(['brand_id' => 1, 'name' => 'Yaris']);
        VehicleModel::create(['brand_id' => 2, 'name' => 'Civic']);
        VehicleModel::create(['brand_id' => 3, 'name' => 'Gol']);
    }
}
