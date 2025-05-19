<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;

class BatchImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch-import {page}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batch import players';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->newUUIDs();
        $this->info('Process Started...');

        foreach ($data as $item) {
            Artisan::call('import-api-data', [
                'uuid' => $item
            ]);
        }
        $this->info('All Missing Players from this page were added');
        return Command::SUCCESS;
    }

    public function newUUIDs(): array 
    {
        
        $base_url = config('services.api.base_url');
        $response = Http::get($base_url . '/listings.json', [
            'type' => 'mlb_card',
            'page' => $this->argument('page')
        ]);

        $listings = $response->json()['listings'];

        foreach ($listings as $listing) {
            $data[] = $listing['item']['uuid'];
        }
        return $data;
    }
}
