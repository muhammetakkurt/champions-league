<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            ['name' => 'Liverpool'],
            ['name' => 'Manchester City'],
            ['name' => 'Chelsea'],
            ['name' => 'Arsenal'],
        ];

        Team::insert($teams);
    }
}
