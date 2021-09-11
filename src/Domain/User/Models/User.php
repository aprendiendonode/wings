<?php

namespace Domain\User\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    public function createLabel(array $args): Project
    {
        $label = new Project();

        $label->name = $args['name'];
        $label->description = $args['description'];
        $label->foreground_color = Label::COLORS[$args['color']]['foreground'];
        $label->background_color = Label::COLORS[$args['color']]['background'];
        $label->user_id = $this->id;

        $label->save();

        return $label;
    }

    public function createProject(array $args): Project
    {
        $project = new Project();

        $project->name = $args['name'];
        $project->description = $args['description'];
        $project->user_id = $this->id;
        $project->project_id = $args['project_id'];

        $project->save();

        return $project;
    }

    public function createTask(array $args): Task
    {
        $task = new Task();

        $task->status = Task::STATUS_OPEN;
        $task->name = $args['name'];
        $task->description = $args['description'];
        $task->user_id = $this->id;
        $task->project_id = $args['project_id'];

        $task->save();

        return $task;
    }

    public function createTime(array $args): Time
    {
        $time = new Time();

        $time->start_at = $args['start_at'];
        $time->end_at = $args['end_at'];
        $time->task_id = $args['task_id'];
        $time->user_id = $this->id;

        $time->save();

        return $time;
    }

    public function createUser(array $args): static
    {
        $user = new static();

        $user->name = $args['name'];
        $user->email = $args['email'];
        $user->role = $args['role'];
        $user->password = Hash::make(Str::random(8));

        $user->save();

        return $user;
    }
}
