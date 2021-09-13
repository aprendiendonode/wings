<?php

namespace Domain\Project\Models;

use Domain\Task\Models\Task;
use Domain\Time\Models\Time;
use Domain\User\Models\User;
use Domain\Label\Models\Label;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Project\Collections\ProjectCollection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Domain\Project\QueryBuilders\ProjectQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'due_at' => 'datetime',
    ];

    public static function newFactory(): ProjectFactory
    {
        return new ProjectFactory();
    }

    public function newEloquentBuilder($query): ProjectQueryBuilder
    {
        return new ProjectQueryBuilder($query);
    }

    public function newCollection(array $models = []): ProjectCollection
    {
        return new ProjectCollection($models);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(static::class);
    }

    public function times(): HasManyThrough
    {
        return $this->hasManyThrough(Time::class, Task::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(static::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'projects_members');
    }

    public function labels(): MorphToMany
    {
        return $this->morphToMany(Label::class, 'labellable');
    }

    public function isDue(): bool
    {
        return now()->gt($this->due_at);
    }

    public function estimateTimePassed(): bool
    {
        return $this->times->sum('time') > $this->estimate_time;
    }

    public function isOwnBy(User $user): bool
    {
        return $this->user->is($user);
    }
}
