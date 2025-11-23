<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class StatsController extends Controller
{
    protected TaskService $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Get task statistics.
     */
    public function index(): JsonResponse
    {
        $stats = $this->taskService->getTaskStats();

        return response()->json($stats);
    }
}
