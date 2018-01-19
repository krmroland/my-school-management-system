<?php

namespace App\Helpers;

trait InteractsWithSemesters
{
    public static function bootInteractsWithSemesters()
    {
        $id = optional(app('active_semester'))->id;

        if ($id > -1) {
            static::addGlobalScope(function ($builder) use ($id) {
                return $builder->fetchBySemesterId($id);
            });

            static::creating(function ($model) use ($id) {
                $model->semester_id = $id;
            });
        }
    }

    public function scopeFetchBySemesterId($builder, $id)
    {
        return $builder->where(['semester_id' => $id]);
    }
}
