<?php

namespace App\Console\Commands;

use App\Models\MLBCard;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class import_api_data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-api-data {uuid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import The API Data Into The Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->importData();
    }

    public function importData() 
    {
        $base_url = config('services.api.base_url');
        $response = Http::get($base_url . '/item.json', [
            'uuid' => $this->argument('uuid')
        ]);
        $json = $response->json();
        
        $filtered = array_filter($json, function ($value) {
            return !is_array($value);
        });

        $playerCard = new MLBCard;


        foreach ($filtered as $key => $value) {
                $playerCard->$key = $value;
        }

        $playerCard->save();
    }
}
