<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Project 1',
            'description' => 'Description for Project 1',
            'start_date' => now(),
        ]);

        Project::create([
            'name' => 'Project 2',
            'description' => 'Description for Project 2',
            'start_date' => now(),
        ]);
    }
}
