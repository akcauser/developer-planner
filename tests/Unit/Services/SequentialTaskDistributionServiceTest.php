<?php

namespace Tests\Unit\Services;

use App\Services\DeveloperProviderService;
use App\Services\SequentialTaskDistributionService;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(SequentialTaskDistributionService::class)]
#[CoversMethod(SequentialTaskDistributionService::class, 'start')]
class SequentialTaskDistributionServiceTest extends TestCase
{
    #[DataProvider('taskDataProvider')]
    #[Test]
    public function test_should_return_developers_with_tasks($tasks, $developers, $expected): void
    {
        $developerProviderService = $this->createMock(DeveloperProviderService::class);
        $service = new SequentialTaskDistributionService($developerProviderService);

        $developerProviderService->expects($this->once())->method('getDevelopers')->willReturn($developers);

        $this->assertEquals($expected, $service->start($tasks));
    }

    public static function taskDataProvider(): array
    {
        return [
            [
                collect([
                   (object)[
                       'id' => 1,
                       'key' => 'task1',
                       'value' => 3,
                       'duration' => 4,
                   ]
                ]),
                [
                    'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
                ],
                [
                    'developers' => ['dev1' => ['value' => 1, 'tasks' => ['task1'], 'taskTime' => 0]],
                    'elapsedTime' => 4
                ],
            ],
            [
                collect([
                    (object)[
                        'id' => 1,
                        'key' => 'task1',
                        'value' => 3,
                        'duration' => 4,
                    ],
                    (object)[
                        'id' => 2,
                        'key' => 'task2',
                        'value' => 5,
                        'duration' => 4,
                    ],
                    (object)[
                        'id' => 3,
                        'key' => 'task3',
                        'value' => 6,
                        'duration' => 3,
                    ],
                ]),
                [
                    'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
                    'dev2' => ['value' => 2, 'tasks' => [], 'taskTime' => 0],
                ],
                [
                    'developers' => [
                        'dev1' => ['value' => 1, 'tasks' => ['task1', 'task3'], 'taskTime' => 0],
                        'dev2' => ['value' => 2, 'tasks' => ['task2'], 'taskTime' => 0]
                    ],
                    'elapsedTime' => 10
                ],
            ],
            [
                collect([
                    (object)[
                        'id' => 1,
                        'key' => 'task1',
                        'value' => 10,
                        'duration' => 4,
                    ],
                    (object)[
                        'id' => 2,
                        'key' => 'task2',
                        'value' => 5,
                        'duration' => 4,
                    ],
                    (object)[
                        'id' => 3,
                        'key' => 'task3',
                        'value' => 3,
                        'duration' => 3,
                    ],
                ]),
                [
                    'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
                    'dev2' => ['value' => 2, 'tasks' => [], 'taskTime' => 0],
                ],
                [
                    'developers' => [
                        'dev1' => ['value' => 1, 'tasks' => ['task1'], 'taskTime' => 0],
                        'dev2' => ['value' => 2, 'tasks' => ['task2', 'task3'], 'taskTime' => 0]
                    ],
                    'elapsedTime' => 10
                ],
            ],
        ];
    }
}
