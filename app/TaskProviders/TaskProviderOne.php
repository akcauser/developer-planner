<?php

namespace App\TaskProviders;

class TaskProviderOne implements TaskProviderInterface
{
    public function getName(): string
    {
        return 'mock-one';
    }

    public function getUrl(): string
    {
        return resource_path('mocks/mock-one.txt');
    }

    public function getIdKey(): string
    {
        return 'id';
    }

    public function getValueKey(): string
    {
        return 'value';
    }

    public function getDurationKey(): string
    {
        return 'estimated_duration';
    }
}
