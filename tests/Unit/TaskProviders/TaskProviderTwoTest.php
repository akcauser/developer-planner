<?php

namespace Tests\Unit\TaskProviders;

use App\TaskProviders\TaskProviderTwo;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(TaskProviderTwo::class)]
#[CoversMethod(TaskProviderTwo::class, 'getName')]
#[CoversMethod(TaskProviderTwo::class, 'getIdKey')]
#[CoversMethod(TaskProviderTwo::class, 'getValueKey')]
#[CoversMethod(TaskProviderTwo::class, 'getDurationKey')]
class TaskProviderTwoTest extends TestCase
{
    #[Test]
    public function test_should_return_provider_name(): void
    {
        $taskProvider = new TaskProviderTwo();

        $this->assertEquals('mock-two', $taskProvider->getName());
    }

    #[Test]
    public function test_should_return_id_key(): void
    {
        $taskProvider = new TaskProviderTwo();

        $this->assertEquals('id', $taskProvider->getIdKey());
    }

    #[Test]
    public function test_should_return_value_key(): void
    {
        $taskProvider = new TaskProviderTwo();

        $this->assertEquals('zorluk', $taskProvider->getValueKey());
    }

    #[Test]
    public function test_should_return_duration_key(): void
    {
        $taskProvider = new TaskProviderTwo();

        $this->assertEquals('sure', $taskProvider->getDurationKey());
    }
}
