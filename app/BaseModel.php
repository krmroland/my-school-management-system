<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    protected $cacheKeys = [];

    public function getDateAttribute($date)
    {
        return $this->asDate($date)->format('d-m-Y');
    }

    public static function boot()
    {
        parent::boot();

        if (static::hasCacheKeys()) {
            $events = ['creating', 'updating', 'deleting'];
            foreach ($events as $event) {
                static::$event(function ($model) {
                    $model->clearCache();
                });
            }
        }
    }

    protected static function hasCacheKeys()
    {
        return !empty((new static())->cacheKeys);
    }

    protected static function clearCache()
    {
        cache()->deleteMultiple((new static())->cacheKeys);
    }
}
