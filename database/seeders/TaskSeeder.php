<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'project_id' => 1, // Assuming project with ID 1 exists
            'title' => 'Task 1 for Project 1',
            'description' => 'Description for Task 1',
            'status' => 'pending',
            'due_date' => now()->addDays(7),
        ]);

        Task::create([
            'project_id' => 1, // Assuming project with ID 1 exists
            'title' => 'Task 2 for Project 1',
            'description' => 'Description for Task 2',
            'status' => 'in_progress',
            'due_date' => now()->addDays(14),
        ]);

        Task::create([
            'project_id' => 2, // Assuming project with ID 2 exists
            'title' => 'Task 1 for Project 2',
            'description' => 'Description for Task 1',
            'status' => 'completed',
            'due_date' => now()->addDays(10),
        ]);
    }
}
