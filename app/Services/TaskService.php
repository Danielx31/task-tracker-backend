<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    /**
     * Get all tasks with filters and pagination.
     */
    public function getAllTasks(array $filters = [], int $perPage = 10): LengthAwarePaginator
    {
        $userId = Auth::id();
        $query = Task::with('user:id,name,email')
            ->where('user_id', $userId);

        // Apply filters
        if (isset($filters['status'])) {
            $query->status($filters['status']);
        }

        if (isset($filters['priority'])) {
            $query->priority($filters['priority']);
        }

        if (isset($filters['due_date'])) {
            $query->dueDate($filters['due_date']);
        }

        if (isset($filters['search'])) {
            $query->search($filters['search']);
        }

        // Sort by latest
        $query->latest();

        return $query->paginate($perPage);
    }

    /**
     * Create a new task.
     */
    public function createTask(array $data): Task
    {
        $data['user_id'] = Auth::id();

        return Task::create($data);
    }

    /**
     * Get a single task.
     */
    public function getTask(int $taskId): ?Task
    {
        $userId = Auth::id();
        return Task::with('user:id,name,email')
            ->where('user_id', $userId)
            ->findOrFail($taskId);
    }

    /**
     * Update a task.
     */
    public function updateTask(int $taskId, array $data): Task
    {
        $userId = Auth::id();
        $task = Task::where('user_id', $userId)->findOrFail($taskId);

        $task->update($data);

        return $task->fresh();
    }

    /**
     * Delete a task.
     */
    public function deleteTask(int $taskId): bool
    {
        $userId = Auth::id();
        $task = Task::where('user_id', $userId)->findOrFail($taskId);

        return $task->delete();
    }

    /**
     * Get task statistics for the authenticated user.
     */
    public function getTaskStats(): array
    {
        $userId = Auth::id();

        return [
            'total' => Task::where('user_id', $userId)->count(),
            'pending' => Task::where('user_id', $userId)->where('status', 'pending')->count(),
            'in_progress' => Task::where('user_id', $userId)->where('status', 'in-progress')->count(),
            'completed' => Task::where('user_id', $userId)->where('status', 'completed')->count(),
            'overdue' => Task::where('user_id', $userId)
                ->where('due_date', '<', now())
                ->whereIn('status', ['pending', 'in-progress'])
                ->count(),
        ];
    }
}
