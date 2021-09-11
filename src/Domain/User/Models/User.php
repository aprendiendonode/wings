<?php

namespace Domain\User\Models;

use Domain\Task\Models\Task;
use Domain\Label\Models\Label;
use Laravel\Sanctum\HasApiTokens;
use Domain\Project\Models\Project;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Domain\User\Collections\UserCollection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Domain\User\QueryBuilders\UserQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public const ROLE_DEFAULT = 'default';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function newFactory(): UserFactory
    {
        return new UserFactory();
    }

    public function newEloquentBuilder($query): UserQueryBuilder
    {
        return new UserQueryBuilder($query);
    }

    public function newCollection(array $models = []): UserCollection
    {
        return new UserCollection($models);
    }

    public function ownedProjects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function ownedTasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function ownedLabels(): HasMany
    {
        return $this->hasMany(Label::class);
    }

    public function assignedProjects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'projects_members');
    }

    public function assignedTasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'assignees');
    }

    public function reviewedTasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'reviewers');
    }

    public function own(Model $model): bool
    {
        if ($model instanceof Project) {
            return $this->projects->contains($model);
        }

        if ($model instanceof Task) {
            return $this->tasks->contains($model);
        }

        return false;
    }
}
