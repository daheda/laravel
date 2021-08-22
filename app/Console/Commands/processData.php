<?php

namespace App\Console\Commands;

use App\Services\Handler\Implementation\JsonHandler;
use App\Services\ProcessingService;
use Illuminate\Console\Command;

class processData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'processData {filename=challenge.json} {--dir} {--t|type=json}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process data command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filename = $this->argument('filename');
        $type = $this->option('type');
        $path = $this->option('dir') ?  $this->option('dir') :  resource_path('tmp');
        $this->info("Processing {$filename} ");
        try {
            $processing = new ProcessingService(new JsonHandler());
            $batch = $processing->processData($path.rtrim('/')."/{$filename}");
            $this->info($batch->id);
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
        return 0;
    }
}
