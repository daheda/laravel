<?php
declare(strict_types=1);

namespace App\Services;


use App\Jobs\AccountProcess;
use App\Services\Handler\HandlerInterface;
use Illuminate\Bus\Batch;
use Illuminate\Support\Facades\Bus;

class ProcessingService
{
    protected $handler;

    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @throws \Throwable
     */
    public function processData($file):Batch
    {
        $chunks = $this->handler->setFile($file)->chunkData();
        $batches = [];
        foreach ($chunks as $chunk) {
            $batches [] = new AccountProcess($chunk);
        }
       return Bus::batch($batches)->dispatch();
    }
}
