<?php

namespace App;

class AllIntakes extends Intake
{
    public function __construct($attributes = [])
    {
        parent::__construct(
            [
                 'id' => -1,
                 'semester' => [
                        'id' => -1,
                        'fullName' => 'All Intakes',
                    ],
             ]
        );

        $this->fill($attributes);
    }

    public function getFullNameAttribute()
    {
        return;
    }

    public static function activated()
    {
        return new static(['is_active' => true]);
    }
}
