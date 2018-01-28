<?php

namespace App\Helpers;

use App\AllIntakes;
use App\Intake;

trait HasIntakes
{
    public function intakes()
    {
        return $this
        ->hasMany(Intake::class)
        ->with(['semester' => function ($builder) {
            return $builder->latest('to');
        }]);
    }

    public function activeIntake()
    {
        return cache()
          ->tags(['intakes'])->sear('active', function () {
              $intake = $this->intakes()->active()->first();

              return $intake ?: AllIntakes::activated();
          });
    }

    public function allIntakes()
    {
        $callback = function () {
            $data = $this->intakes()->latest('to')->get();

            if ($data->isNotEmpty()) {
                $data[] = new AllIntakes();
            }

            return $data;
        };

        return cache()->tags('intakes')->sear('*', $callback);
    }
}
