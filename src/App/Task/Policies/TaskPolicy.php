<?php

namespace App\Task\Policies;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use Domain\Project\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, Project $project): bool
    {
        return $project->user->is($user)
            || $project->members->contains($user);
    }

    public function view(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function create(User $user, Project $project): bool
    {
        return $project->user->is($user)
            || $project->members->contains($user);
    }

    public function update(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function syncAssignee(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function syncReviewer(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function delete(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function restore(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }

    public function forceDelete(User $user, Task $task): bool
    {
        return $task->user->is($user)
            || $task->project->user->is($user)
            || $task->project->members->contains($user);
    }
}
