<?php

namespace App\TaskProviders;

class TaskProviderTwo implements TaskProviderInterface
{
    public function getName(): string
    {
        return 'mock-two';
    }

    public function getUrl(): string
    {
        return resource_path('mocks/mock-two.txt');
    }

    public function getIdKey(): string
    {
        return 'id';
    }

    public function getValueKey(): string
    {
        return 'zorluk';
    }

    public function getDurationKey(): string
    {
        return 'sure';
    }
}
