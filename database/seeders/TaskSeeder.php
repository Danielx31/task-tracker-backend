<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $statuses = ['pending', 'in-progress', 'completed'];
        $priorities = ['low', 'medium', 'high'];

        $taskTemplates = [
            'Complete project documentation',
            'Review pull requests',
            'Update dependencies',
            'Fix bug in authentication',
            'Implement new feature',
            'Write unit tests',
            'Deploy to production',
            'Setup CI/CD pipeline',
            'Database optimization',
            'Code refactoring',
        ];

        foreach ($users as $user) {
            // Create 5 tasks per user
            for ($i = 0; $i < 5; $i++) {
                Task::create([
                    'user_id' => $user->id,
                    'title' => $taskTemplates[array_rand($taskTemplates)],
                    'description' => 'This is a sample task description for testing purposes.',
                    'status' => $statuses[array_rand($statuses)],
                    'priority' => $priorities[array_rand($priorities)],
                    'due_date' => now()->addDays(rand(1, 30)),
                ]);
            }
        }
    }
}
