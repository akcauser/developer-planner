<?php

namespace App\Services;

use App\TaskProviders\TaskProviderInterface;
use App\Models\Task;

class DeveloperProviderService
{
    public function getDevelopers(): array
    {
        return [
            'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
            'dev2' => ['value' => 2, 'tasks' => [], 'taskTime' => 0],
            'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
            'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
            'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
        ];
    }
}
