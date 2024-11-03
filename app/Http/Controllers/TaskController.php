<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepositoryInterface;
use App\Services\SequentialTaskDistributionService;

class TaskController extends Controller
{
    public function __invoke(
        SequentialTaskDistributionService $taskDistributionService,
        TaskRepositoryInterface $taskRepository
    )
    {
        $tasks = $taskRepository->get();
        $nonSorted = $taskDistributionService->start($tasks);
        $sortedByValueAscending = $taskDistributionService->start($tasks->sortBy('value'));
        $sortedByValueDescending = $taskDistributionService->start($tasks->sortByDesc('value'));

        return view('welcome', [
            'solutions' => [
                'Non Sorted' => $nonSorted,
                'Sorted By Value Ascending' => $sortedByValueAscending,
                'Sorted By Value Descending' => $sortedByValueDescending,
            ],
        ]);
    }
}
