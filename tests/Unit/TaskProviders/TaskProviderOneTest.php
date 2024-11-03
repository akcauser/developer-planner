<?php

namespace Tests\Unit\TaskProviders;

use App\TaskProviders\TaskProviderOne;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(TaskProviderOne::class)]
#[CoversMethod(TaskProviderOne::class, 'getName')]
#[CoversMethod(TaskProviderOne::class, 'getIdKey')]
#[CoversMethod(TaskProviderOne::class, 'getValueKey')]
#[CoversMethod(TaskProviderOne::class, 'getDurationKey')]
class TaskProviderOneTest extends TestCase
{
    #[Test]
    public function test_should_return_provider_name(): void
    {
        $taskProvider = new TaskProviderOne();

        $this->assertEquals('mock-one', $taskProvider->getName());
    }

    #[Test]
    public function test_should_return_id_key(): void
    {
        $taskProvider = new TaskProviderOne();

        $this->assertEquals('id', $taskProvider->getIdKey());
    }

    #[Test]
    public function test_should_return_value_key(): void
    {
        $taskProvider = new TaskProviderOne();

        $this->assertEquals('value', $taskProvider->getValueKey());
    }

    #[Test]
    public function test_should_return_duration_key(): void
    {
        $taskProvider = new TaskProviderOne();

        $this->assertEquals('estimated_duration', $taskProvider->getDurationKey());
    }
}
