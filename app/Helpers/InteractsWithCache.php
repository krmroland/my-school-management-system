<?php

namespace App\Helpers;

trait InteractsWithCache
{
    protected $cacheKeys = [];

    public static function boot()
    {
        parent::boot();

        $events = ['creating', 'updating', 'deleting'];

        foreach ($events as $event) {
            static::$event(function ($model) {
                $model->clearCache();
            });
        }
    }

    protected function hasCache()
    {
        return true;
    }

    protected function clearCache()
    {
        if ($this->hasCache()) {
            $cache = $this->tableCacheTag()->flush();
        }
    }

    public function cacheKey($value = null)
    {
        $value = $value ?: $this->id;

        return $this->getTable().'/'.$value;
    }

    public static function getAll()
    {
        $instance = new static();

        return $instance
            ->tableCacheTag()
            ->sear('*', function () use ($instance) {
                if (method_exists($instance, 'cacheAll')) {
                    return $instance->cacheAll();
                }

                return $instance->latest()->get();
            });
    }

    public function tableCacheTag()
    {
        return cache()->tags($this->getTable());
    }

    public function resolveRouteBinding($value)
    {
        return $this->tableCacheTag()
            ->sear($this->cacheKey($value), function () use ($value) {
                return $this->where($this->getRouteKeyName(), $value)->first();
            });
    }
}
