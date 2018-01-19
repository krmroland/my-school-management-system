<?php

namespace App;

class Note extends BaseModel
{
    //turn off the timestamps
    public $timestamps = false;

    protected $dates = ['date'];

    public static function updateById($id, $data)
    {
        //clear the entire cache
        cache()->flush();

        static::findOrFail($id)->update($data);
    }
}
