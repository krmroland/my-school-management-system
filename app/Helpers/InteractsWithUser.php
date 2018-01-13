<?php

namespace App\Helpers;

trait InteractsWithUser
{
    public static function bootInteractsWithUser()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });

        static::addGlobalScope(function ($builder) {
            return $builder->where(['user_id' => auth()->id()]);
        });
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
