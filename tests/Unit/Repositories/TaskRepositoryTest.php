<?php

namespace Tests\Unit\Repositories;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(TaskRepository::class)]
#[CoversMethod(TaskRepository::class, 'create')]
#[CoversMethod(TaskRepository::class, 'get')]
class TaskRepositoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function test_should_create_task_with_attributes(): void
    {
        $attributes = [
            'key' => $this->faker->word,
            'value' => $this->faker->randomDigitNotNull(),
            'duration' => $this->faker->randomDigitNotNull(),
        ];
        $taskRepository = new TaskRepository();

        $taskRepository->create($attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    #[Test]
    public function test_should_return_tasks(): void
    {
        Task::factory()->create();
        $taskRepository = new TaskRepository();

        $this->assertEquals(Task::all(), $taskRepository->get());
    }
}
