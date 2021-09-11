<?php

namespace Domain\Time\Models;

use Database\Factories\TimeFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Time\Collections\TimeCollection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Label\QueryBuilders\TimeQueryBuilder;
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

    public function newEloquentBuilder($query): TimeQueryBuilder
    {
        return new TimeQueryBuilder($query);
    }

    public function newCollection(array $models = []): TimeCollection
    {
        return new TimeCollection($models);
    }
}
