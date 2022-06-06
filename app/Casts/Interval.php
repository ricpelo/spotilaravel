<?php

namespace App\Casts;

use DateInterval;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Interval implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return new DateInterval($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        return $value->format('P%yY%mM%dDT%hH%IM%SS');
    }
}
