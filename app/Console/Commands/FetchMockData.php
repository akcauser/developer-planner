<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\TaskProviders\TaskProviderInterface;
use App\TaskProviders\TaskProviderOne;
use App\TaskProviders\TaskProviderTwo;
use App\Services\MockDataFetcherService;
use Illuminate\Console\Command;

class FetchMockData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-mock-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches mock data defined below';

    /**
     * Execute the console command.
     */
    public function handle(MockDataFetcherService $mockDataFetcher): void
    {
        Task::truncate();

        foreach ($this->mocks() as $mock) {
            $mockDataFetcher->fetch($mock);
        }
    }

    public function mocks(): array
    {
        return [
            new TaskProviderOne(),
            new TaskProviderTwo(),
        ];
    }
}
