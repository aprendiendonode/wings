<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const STATUS_OPEN = 'open';
    public const STATUS_IN_PROGRESS = 'in progress';
    public const STATUS_REVIEWED = 'reviewed';
    public const STATUS_CLOSED = 'closed';

    protected $casts = [
        'due_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function labels(): MorphToMany
    {
        return $this->morphToMany(Label::class, 'labellable');
    }

    public function assignees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'assignees');
    }

    public function reviewers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reviewers');
    }

    public function scopeStatusIs(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    public function scopeIsOpen(Builder $query): Builder
    {
        return $query->statusIs(static::STATUS_OPEN);
    }

    public function scopeIsInProgress(Builder $query): Builder
    {
        return $query->statusIs(static::STATUS_IN_PROGRESS);
    }

    public function scopeIsReviewed(Builder $query): Builder
    {
        return $query->statusIs(static::STATUS_REVIEWED);
    }

    public function scopeIsClosed(Builder $query): Builder
    {
        return $query->statusIs(static::STATUS_CLOSED);
    }

    public function isDue(): bool
    {
        return now()->gt($this->due_at);
    }

    public function estimateTimePassed(): bool
    {
        return $this->times->sum('time') > $this->estimate_time;
    }

    public function isOpen(): bool
    {
        return $this->status === static::STATUS_OPEN;
    }

    public function isInProgress(): bool
    {
        return $this->status === static::STATUS_IN_PROGRESS;
    }

    public function isReviewed(): bool
    {
        return $this->status === static::STATUS_REVIEWED;
    }

    public function isClosed(): bool
    {
        return $this->status === static::STATUS_CLOSED;
    }

    public function markAsOpen(): static
    {
        $this->status = static::STATUS_OPEN;

        return $this;
    }

    public function markAsInProgress(): static
    {
        $this->status = static::STATUS_IN_PROGRESS;

        return $this;
    }

    public function markAsReviewed(): static
    {
        $this->status = static::STATUS_REVIEWED;

        return $this;
    }

    public function markAsClosed(): static
    {
        $this->status = static::STATUS_CLOSED;

        return $this;
    }

    public function syncMembers(array $args): static
    {
        $this->assignees()->sync($args['assignees']);

        // TODO: notify the assignees

        return $this;
    }

    public function syncReviewers(array $args): static
    {
        $this->reviewers()->sync($args['reviewers']);

        // TODO: notify the reviewers

        return $this;
    }

    public function isOwnBy(User $user): bool
    {
        return $this->user->is($user);
    }
}
