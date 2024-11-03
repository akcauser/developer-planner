<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $attributes)
    {
        return Task::create($attributes);
    }

    public function get(): Collection
    {
        return Task::query()->get();
    }
}
