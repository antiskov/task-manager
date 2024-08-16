<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::insert([
            [
                'title' => 'First Task',
                'description' => 'This is the first task.',
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Second Task',
                'description' => 'This is the second task.',
                'status' => 'closed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Third Task',
                'description' => 'This is the third task.',
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

