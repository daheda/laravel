<?php
declare(strict_types=1);

namespace App\Services\Handler;


trait DataFilterTrait
{
    public function filterData(array $data, array $creteria) :array
    {
        return  array_filter($data, $creteria);
    }

    public function uniq(array $data)
    {

    }
}
