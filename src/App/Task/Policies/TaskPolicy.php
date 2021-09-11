<?php

namespace App\Task\Policies;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Task $task): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Task $task): bool
    {
        return false;
    }

    public function syncAssignees(User $user, Task $task): bool
    {
        return false;
    }

    public function syncReviewers(User $user, Task $task): bool
    {
        return false;
    }

    public function delete(User $user, Task $task): bool
    {
        return false;
    }

    public function restore(User $user, Task $task): bool
    {
        return false;
    }

    public function forceDelete(User $user, Task $task): bool
    {
        return false;
    }
}
