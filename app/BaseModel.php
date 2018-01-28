<?php

namespace App;

use App\Helpers\InteractsWithCache;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use InteractsWithCache;

    protected $guarded = [];

    public function getDateAttribute($date)
    {
        return $this->asDate($date)->format('d-m-Y');
    }
}
