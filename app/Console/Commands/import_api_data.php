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
    protected $signature = 'import-api-data {uuid}';

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
        $players = $this->allPlayers();
        
        foreach ($players as $playerUUID) {
            if($this->argument('uuid') === $playerUUID) {
                $this->error('A Player with this UUID is already in the Database');
                return Command::FAILURE;
            }
        };
        $this->importData();
        $this->info('Player Added to the Database');
        return Command::SUCCESS;
    }

    public function importData() :void
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

    public function allPlayers() :array 
    {
        
        $players = MLBCard::select('uuid')
            ->whereNotNull('uuid')
            ->get();

        foreach($players as $player) {
            $uuid[] = $player['uuid'];
        }
        return $uuid;
    }
}
