<?php

namespace Tests\Unit\Services;

use App\Services\DeveloperProviderService;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(DeveloperProviderService::class)]
#[CoversMethod(DeveloperProviderService::class, 'getDevelopers')]
class DeveloperProviderServiceTest extends TestCase
{
    const DEFAULT_DEVELOPERS = [
        'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
        'dev2' => ['value' => 2, 'tasks' => [], 'taskTime' => 0],
        'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
        'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
        'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
    ];

    #[Test]
    public function test_should_return_developers(): void
    {
        $service = new DeveloperProviderService();

        $this->assertEquals(self::DEFAULT_DEVELOPERS, $service->getDevelopers());
    }
}
