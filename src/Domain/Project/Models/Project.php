<?php

namespace Domain\Project\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    // TODO: add scopes to retrieve members by their roles

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

    public function syncMembers(array $args): static
    {
        $this->members()->sync($args['members']);

        // TODO: notify the members

        return $this;
    }
}
