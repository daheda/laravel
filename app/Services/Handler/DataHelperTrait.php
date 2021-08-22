<?php
declare(strict_types=1);

namespace App\Services\Handler;


use Carbon\Carbon;

trait DataHelperTrait
{
    private function normalizeDate($date)
    {
        if ($date && preg_match('/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/', $date)) {
            return strtotime($date) ? date('Y-m-d', strtotime($date)): null;
        }
        return $date;
    }

    public function formatDate(array $data, array $keys):array
    {
        foreach($keys as $key) {
            $data[$key] = Carbon::parse($this->normalizeDate($data[$key]), 'UTC');
        }
        return $data;
    }
}
