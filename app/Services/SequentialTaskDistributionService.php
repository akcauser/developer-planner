<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Collection;

class SequentialTaskDistributionService
{
    private array $developers = [];
    private DeveloperProviderService $developerProviderService;

    public function __construct(DeveloperProviderService $developerProviderService)
    {
        $this->developerProviderService = $developerProviderService;
    }

    /**
     * @param Collection $tasks
     * @return array
     */
    public function start(Collection $tasks): array
    {
        $this->developers = $this->developerProviderService->getDevelopers();

        $elapsedTime = 0;
        $tasks = $tasks->reverse();
        $tasks = $this->distribute($tasks);

        while (true) {
            $remainedTaskTime = collect($this->developers)->pluck('taskTime')->sum();

            if ($tasks->isEmpty() && $remainedTaskTime == 0) {
                break;
            }

            $tasks = $this->distribute($tasks);
            $elapsedTime++;
        }

        return [
            'developers' => $this->developers,
            'elapsedTime' => $elapsedTime,
        ];
    }

    private function distribute(Collection $tasks): Collection
    {
        foreach ($this->developers as &$developer) {
            if ($developer['taskTime'] > 0) {
                $developer['taskTime']--;
            }

            if ($developer['taskTime'] > 0 || $tasks->isEmpty()) {
                continue;
            }

            /** @var Task $task */
            $task = $tasks->pop();
            $developer['tasks'][] = $task->key;
            $coefficient = $task->value / $task->duration;
            $developer['taskTime'] = $task->duration;

            if ($developer['value'] < $coefficient) {
                $developer['taskTime'] = (int)ceil($task->value / $developer['value']);
            }
        }

        return $tasks;
    }
}
