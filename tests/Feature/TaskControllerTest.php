<?php

namespace Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    const DEFAULT_DEVELOPERS = [
        'dev1' => ['value' => 1, 'tasks' => [], 'taskTime' => 0],
        'dev2' => ['value' => 2, 'tasks' => [], 'taskTime' => 0],
        'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
        'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
        'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
    ];

    /**
     * A basic test example.
     */
    public function test_that_root_path_should_return_welcome_view(): void
    {
        Task::factory()->create(['id' => 1, 'key' => 'task1', 'value' => 3, 'duration' => 4]);
        Task::factory()->create(['id' => 2, 'key' => 'task2', 'value' => 5, 'duration' => 2]);
        $expectedNonSorted = [
            'developers' => [
                'dev1' => ['value' => 1, 'tasks' => ['task1'], 'taskTime' => 0],
                'dev2' => ['value' => 2, 'tasks' => ['task2'], 'taskTime' => 0],
                'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
                'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
                'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
            ],
            'elapsedTime' => 4,
        ];
        $expectedSortedSortedByValueAscending = [
            'developers' => [
                'dev1' => ['value' => 1, 'tasks' => ['task1'], 'taskTime' => 0],
                'dev2' => ['value' => 2, 'tasks' => ['task2'], 'taskTime' => 0],
                'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
                'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
                'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
            ],
            'elapsedTime' => 4,
        ];
        $expectedSortedSortedByValueDescending = [
            'developers' => [
                'dev1' => ['value' => 1, 'tasks' => ['task2'], 'taskTime' => 0],
                'dev2' => ['value' => 2, 'tasks' => ['task1'], 'taskTime' => 0],
                'dev3' => ['value' => 3, 'tasks' => [], 'taskTime' => 0],
                'dev4' => ['value' => 4, 'tasks' => [], 'taskTime' => 0],
                'dev5' => ['value' => 5, 'tasks' => [], 'taskTime' => 0],
            ],
            'elapsedTime' => 5,
        ];

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
        $response->assertViewHas('solutions');
        $response->assertViewHas('solutions.Non Sorted', $expectedNonSorted);
        $response->assertViewHas('solutions.Sorted By Value Ascending', $expectedSortedSortedByValueAscending);
        $response->assertViewHas('solutions.Sorted By Value Descending', $expectedSortedSortedByValueDescending);
    }
}
