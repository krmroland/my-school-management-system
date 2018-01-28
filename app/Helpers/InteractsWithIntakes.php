<?php

namespace App\Helpers;

trait InteractsWithIntakes
{
    /**
     * gets the active intake id.
     *
     * @return int
     */
    public static function activeIntakeId()
    {
        return optional(app('active_intake'))->id;
    }

    /**
     * boot method on the model using it.
     */
    public static function bootInteractsWithIntakes()
    {
        $id = static::activeIntakeId();

        if ($id > -1) {
            static::addGlobalScope(function ($builder) use ($id) {
                return $builder->fetchByIntakeId($id);
            });

            static::creating(function ($model) use ($id) {
                $model->intake_id = $id;
            });
        }
    }

    /**
     * fetches an intake by its id.
     *
     * @param Illuminate\Database\Query\Builder $builder
     * @param int                               $id
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeFetchByIntakeId($builder, $id)
    {
        return $builder->where(['intake_id' => $id]);
    }
}
