<?php

namespace Domain\Time\Models;

use Database\Factories\TimeFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($time) {
            $time->time = $time->end_at->diffInMinutes($time->start_at);
        });
    }

    public static function newFactory(): TimeFactory
    {
        return new TimeFactory();
    }
}
