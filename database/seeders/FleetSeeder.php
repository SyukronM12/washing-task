<?php

namespace Database\Seeders;

// use App\Models\Asset\Fleet;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FleetSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fleets')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Avanza Veloz 1.5',
                'plate_number' => 'B 2212 KYB',
                'year' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Innova Reborn',
                'plate_number' => 'B 1417 KYJ',
                'year' => 2017,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Brio Satya',
                'plate_number' => 'AB 1383 QF',
                'year' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
