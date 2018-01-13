<?php

namespace App;

use App\Helpers\DateString;

class Cycle extends BaseModel
{
    /**
     * appends the following fields during serialization.
     *
     * @var array
     */
    protected $appends = ['fullName'];
    /**
     * treat these fields as dates.
     *
     * @var array
     */
    protected $dates = ['to', 'from'];

    protected $casts = ['is_active' => 'boolean'];

    /**
     * get the active cycle.
     *
     * @return self
     */
    public static function active()
    {
        return cache()->remember('Cycle::active', 60, function () {
            $active = static::where(['is_active' => true])->first();

            return $active ?: new AllCycles();
        });
    }

    public function getFullNameAttribute()
    {
        return sprintf(
            '%s to %s',
            $this->from->format('d/m/Y'),
            $this->to->format('d/m/Y')
        );
    }

    public static function addNew($dateString)
    {
        static::clearAllCache();

        return static::Create(
            DateString::makeFrom($dateString)->toArray()
        );
    }

    public static function getAll()
    {
        return cache()->remember('Cycle::getAll', 60, function () {
            $cycles = static::latest('to')->get();
            if ($cycles->isNotEmpty()) {
                $cycles[] = new AllCycles();
            }

            return $cycles;
        });
    }

    public static function activate($id)
    {
        static::clearAllCache();

        if ($id == -1) {
            static::deactivateAll();

            return;
        }

        $cycle = tap(static::find($id), function () {
            static::deactivateAll();
        });

        return $cycle->update(['is_active' => true]);
    }

    protected static function deactivateAll()
    {
        static::query()->update(['is_active' => false]);
    }

    public static function clearAllCache()
    {
        cache()->deleteMultiple(['Cycle::getAll', 'Cycle::active']);
    }
}
