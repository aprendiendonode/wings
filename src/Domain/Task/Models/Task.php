<?php

namespace Domain\Task\Models;

use Domain\Task\States\Open;
use Domain\User\Models\User;
use Domain\Task\States\Closed;
use Domain\Task\States\Reviewed;
use Domain\Task\States\TaskState;
use Spatie\ModelStates\HasStates;
use Domain\Task\States\InProgress;
use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Task\Collections\TaskCollection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Label\QueryBuilders\TaskQueryBuilder;
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

    public static function newFactory(): TaskFactory
    {
        return new TaskFactory();
    }

    public function newEloquentBuilder($query): TaskQueryBuilder
    {
        return new TaskQueryBuilder($query);
    }

    public function newCollection(array $models = []): TaskCollection
    {
        return new TaskCollection($models);
    }

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
