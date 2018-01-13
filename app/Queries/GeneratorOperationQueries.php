<?php

namespace App\Queries;

use App\GeneratorOperation;

class GeneratorOperationQueries
{
    public static function getAll()
    {
        return
        static::groupData(
            GeneratorOperation::baseSummaryQuery()
             ->latest('date')
             ->groupBy('year', 'month')
             ->orderBy('month')
             ->paginate(24)
        );
    }

    public static function groupData($data)
    {
        $items = $data->getCollection()
                ->groupBy('year')->map(function ($months) {
                    return  $months->keyBy('month');
                });

        return $data->setCollection($items);
    }
}
