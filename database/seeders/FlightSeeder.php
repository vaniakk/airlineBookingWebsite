<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("flights")->insert([
            [
                'flight_code' => 'JT610',
                'origin' => 'SUB',
                'destination' => 'CGK',
                'departure_time' => Carbon::parse('2025-01-01'),
                'arrival_time'=> Carbon::parse('2025-01-0'),
            ],
            [
                'flight_code' => 'JT611',
                'origin' => 'CGK',
                'destination' => 'SUB',
                'departure_time' => Carbon::parse('2025-02-01'),
                'arrival_time'=> Carbon::parse('2025-02-02'),
            ],
            [
                'flight_code' => 'JT612',
                'origin' => 'SUB',
                'destination' => 'JKT',
                'departure_time' => Carbon::parse('2025-03-01'),
                'arrival_time'=> Carbon::parse('2025-03-02'),
            ],
            [
                'flight_code' => 'JT613',
                'origin' => 'SUB',
                'destination' => 'SGP',
                'departure_time' => Carbon::parse('2025-04-01'),
                'arrival_time'=> Carbon::parse('2025-04-02'),
            ],
            [
                'flight_code' => 'JT614',
                'origin' => 'SUB',
                'destination' => 'BGK',
                'departure_time' => Carbon::parse('2025-04-01'),
                'arrival_time'=> Carbon::parse('2025-04-02'),
            ],
        ]);
    }
}
