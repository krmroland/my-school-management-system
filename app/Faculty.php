<?php

namespace App;

class Faculty extends BaseModel
{
    /**
     * reset all faculties.
     */
    public static function reset()
    {
        cache()->flush();

        static::truncate();

        static::insert(static::collectConfigData());
    }

    protected static function collectConfigData()
    {
        return collect(config('faculties'))->map(function ($name, $code) {
            return [
                'name' => title_case($name),
                'code' => title_case($code),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->toArray();
    }

    public static function cacheAll()
    {
        return static::oldest('name')->get();
    }

    /**
     * find the cached id of the faculty.
     *
     * @param int $id
     *
     * @throws Illuminate\Database\Eloquent\ModelNotFoundException
     *
     * @return self
     */
    public static function cachedId($id)
    {
        return static::tableCacheTag()->seal("$id", function () use ($id) {
            return static::findOrFail($id);
        });
    }
}
