<?php
declare(strict_types=1);

namespace App\Services\Handler\Implementation;


use App\Services\Filter\Filter;
use App\Services\Handler\DataFilterTrait;
use App\Services\Handler\HandlerInterface;
use JsonMachine\JsonMachine;

class JsonHandler implements HandlerInterface
{

    use DataFilterTrait;

    protected  const CHUNK_SIZE = 500;
    protected $file;

    public function setFile(string $file): HandlerInterface
    {
        $this->file = $file;
        return $this;
    }

    public function chunkData(): array
    {
        $iterator = JsonMachine::fromFile($this->file);
        $data = [];
        foreach ($iterator as $object) {
            $data[] = $object;
        }
        //$data = $this->filterData($data, [Filter::class, 'filterAge']);
        return array_chunk($data, self::CHUNK_SIZE);
    }

}
