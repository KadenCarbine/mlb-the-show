<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will make a Service Container';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is the name of the Service?');

        $directory = app_path('/Services');
        $file = "{$directory}/{$name}.php";

        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        if(!file_exists($file)) {
            $stubPath = str_replace('\\', '/', base_path('resources\stubs\service.stub'));
            $stub = file_get_contents($stubPath);
    
            $content = str_replace('{{ className }}', $name, $stub);
            file_put_contents($file, $content);
        } else {
            $this->error('Service Already Exists');
        }
    }
}
