<?php

namespace Database\Seeders;

use App\Models\BloodPressure;
use Illuminate\Database\Seeder;

class BloodPressureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pressures = [];
        for ($i=0; $i < 150000; $i++) {
            $pressures[] = [
                'rate' => rand(50, 100),
                'systolic' => rand(100, 140),
                'diastolic' => rand(70, 120),
                'created_at' => now()->subDays(rand(2, 120))
                    ->format('Y-m-d H:i:s'),
                'updated_at' => now()
            ];
        }
        $chunks = collect($pressures)->chunk(1000);
        foreach ($chunks as $chunk) {
            BloodPressure::insert($chunk->toArray());
        }
    }
}
