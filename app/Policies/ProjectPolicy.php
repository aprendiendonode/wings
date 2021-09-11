<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Project $project): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Project $project): bool
    {
        return false;
    }

    public function syncMembers(User $user, Project $project): bool
    {
        return false;
    }

    public function delete(User $user, Project $project): bool
    {
        return false;
    }

    public function restore(User $user, Project $project): bool
    {
        return false;
    }

    public function forceDelete(User $user, Project $project): bool
    {
        return false;
    }
}
