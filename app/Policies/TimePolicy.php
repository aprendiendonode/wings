<?php

namespace App\Policies;

use App\Models\Time;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Time $time): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Time $time): bool
    {
        return false;
    }

    public function delete(User $user, Time $time): bool
    {
        return false;
    }

    public function restore(User $user, Time $time): bool
    {
        return false;
    }

    public function forceDelete(User $user, Time $time): bool
    {
        return false;
    }
}
