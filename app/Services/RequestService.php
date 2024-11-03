<?php

namespace App\Services;

use App\TaskProviders\TaskProviderInterface;
use App\Models\Task;

class RequestService
{
    public function getJson(string $url): array
    {
        return json_decode(file_get_contents($url));
    }
}
