<?php
declare(strict_types=1);

namespace App\Services\Handler;


interface HandlerInterface
{
    public function setFile(string $file):HandlerInterface;
    public function chunkData():array;
}
