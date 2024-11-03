<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function create(array $attributes);
    public function get(): Collection;
}
