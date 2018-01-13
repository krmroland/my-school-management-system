<?php

namespace App;

trait InteractsWithCycles
{
    public static function boot()
    {
        $pct = app('pct');

        if ($pct->hasCycleSelected()) {
            static::addGlobalScope(function ($builder) use ($pct) {
                $builder->where('cycle_id', $pct->activeCycleId());
            });
        }

        static::creating(function ($model) use ($pct) {
            $pct->confirmACycleIsSelected();
            $model->cycle_id = $pct->activeCycleId();
        });
    }
}
