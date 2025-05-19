<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class ImportAllPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-all-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will enter all missing players into the Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $totalPages = $this->numberOfPages();
        
        $bar = $this->output->createProgressBar($totalPages);
        $this->info('Processing...');
        $bar->start();

        for ($i = 1; $i <= $totalPages; $i++) {
            Artisan::call('batch-import', [
                'page' => $i
            ]);
            $bar->advance();
        }
        $bar->finish();
        $this->newLine();
        $this->info('Process Finished: Every missing player has been added to the Database');
        return Command::SUCCESS;
    }

    public function numberOfPages() :int
    {
        $base_url = config('services.api.base_url');

        $response = Http::get($base_url . '/listings.json', [
            'type' => 'mlb_card', 
        ]);

        return $response['total_pages'];
    }
}
