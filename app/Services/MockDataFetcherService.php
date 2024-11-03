<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use App\Repositories\TaskRepositoryInterface;
use App\TaskProviders\TaskProviderInterface;

class MockDataFetcherService
{
    private RequestService $requestService;
    private TaskRepository $taskRepository;

    public function __construct(RequestService $requestService, TaskRepositoryInterface $taskRepository)
    {
        $this->requestService = $requestService;
        $this->taskRepository = $taskRepository;
    }

    public function fetch(TaskProviderInterface $mock): void
    {
        $tasks = $this->requestService->getJson($mock->getUrl());
        $name = $mock->getName();
        $idKey = $mock->getIdKey();
        $valueKey = $mock->getValueKey();
        $durationKey = $mock->getDurationKey();

        foreach ($tasks as $task) {
            $this->taskRepository->create([
                'key' => $name . '::' . $task->$idKey,
                'value' => $task->$valueKey,
                'duration' => $task->$durationKey,
            ]);
        }
    }
}
