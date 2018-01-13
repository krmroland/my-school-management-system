<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = [];

    public function getDateAttribute($date)
    {
        return $this->asDate($date)->format('d-m-Y');
    }
}
