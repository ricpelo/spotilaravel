<?php

namespace App\Models;

use App\Casts\Interval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $casts = [
        'duracion' => Interval::class,
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
