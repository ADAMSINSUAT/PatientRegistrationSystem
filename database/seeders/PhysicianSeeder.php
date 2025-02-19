<?php

namespace Database\Seeders;

use App\Models\Physicians;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhysicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Physicians::create(['name'=>'Dr. Amelia D. Singh, MD', 'licenseno'=>'0009125']);
        Physicians::create(['name'=>'Dr. Jonathan M. Young, MD', 'licenseno'=>'0009123']);
    }
}
