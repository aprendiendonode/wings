<?php

namespace Domain\Task\Models;

use Domain\Task\States\Open;
use Domain\Task\States\Closed;
use Domain\Task\States\TaskState;
use Spatie\ModelStates\HasStates;
use Domain\Task\States\InProgress;
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
    use HasStates;
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

    public function getState(): TaskState
    {
        if ($this->status === Open::CODE) {
            return new Open($this);
        }

        if ($this->status === InProgress::CODE) {
            return new InProgress($this);
        }

        if ($this->status === Reviewed::CODE) {
            return new Reviewed($this);
        }

        if ($this->status === Closed::CODE) {
            return new Closed($this);
        }
    }

    protected function registerStates(): void
    {
        $this->addState('status', TaskState::class)
            ->allowTransition(Open::class, InProgress::class)
            ->allowTransition(Open::class, Closed::class)
            ->allowTransition(InProgress::class, Closed::class)
            ->allowTransition(InProgress::class, Open::class)
            ->allowTransition(Closed::class, InProgress::class)
            ->allowTransition(Closed::class, Open::class);
    }

    /** REFACTOR */
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
