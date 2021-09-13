<?php

namespace Domain\Time\Models;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use Database\Factories\TimeFactory;
use Domain\Time\Events\TimeSavingEvent;
use Illuminate\Database\Eloquent\Model;
use Domain\Time\Collections\TimeCollection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Time\QueryBuilders\TimeQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    protected $dispatchesEvents = [
        'saving' => TimeSavingEvent::class,
    ];

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

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
