<?php

namespace Tests\Unit\Services;

use App\Repositories\TaskRepository;
use App\Services\MockDataFetcherService;
use App\Services\RequestService;
use App\TaskProviders\TaskProviderOne;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

#[CoversClass(MockDataFetcherService::class)]
#[CoversMethod(MockDataFetcherService::class, 'fetch')]
class MockDataFetcherServiceTest extends TestCase
{
    #[Test]
    public function test_should_create_task_that_come_from_provider(): void
    {
        $mock = $this->createMock(TaskProviderOne::class);
        $requestService = $this->createMock(RequestService::class);
        $taskRepository = $this->createMock(TaskRepository::class);
        $service = new MockDataFetcherService($requestService, $taskRepository);
        $response = [(object)['id' => 1, 'value' => 3, 'estimated_duration' => 4]];

        $mock->expects($this->once())->method('getUrl')->willReturn($url = $this->faker->url());
        $mock->expects($this->once())->method('getName')->willReturn('mock-name');
        $mock->expects($this->once())->method('getIdKey')->willReturn('id');
        $mock->expects($this->once())->method('getValueKey')->willReturn('value');
        $mock->expects($this->once())->method('getDurationKey')->willReturn('estimated_duration');
        $requestService->expects($this->once())->method('getJson')->with($url)->willReturn($response);
        $taskRepository->expects($this->once())
            ->method('create')
            ->with(['key' => 'mock-name::1', 'value' => 3, 'duration' => 4]);

        $service->fetch($mock);
    }

    #[Test]
    public function test_should_not_create_task_when_provider_send_empty_data(): void
    {
        $mock = $this->createMock(TaskProviderOne::class);
        $requestService = $this->createMock(RequestService::class);
        $taskRepository = $this->createMock(TaskRepository::class);
        $service = new MockDataFetcherService($requestService, $taskRepository);
        $response = [];

        $mock->expects($this->once())->method('getUrl')->willReturn($url = $this->faker->url());
        $mock->expects($this->once())->method('getName')->willReturn('mock-name');
        $mock->expects($this->once())->method('getIdKey')->willReturn('id');
        $mock->expects($this->once())->method('getValueKey')->willReturn('value');
        $mock->expects($this->once())->method('getDurationKey')->willReturn('estimated_duration');
        $requestService->expects($this->once())->method('getJson')->with($url)->willReturn($response);
        $taskRepository->expects($this->never())->method('create');

        $service->fetch($mock);
    }
}
