<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Label $label): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Label $label): bool
    {
        return false;
    }

    public function delete(User $user, Label $label): bool
    {
        return false;
    }

    public function restore(User $user, Label $label): bool
    {
        return false;
    }

    public function forceDelete(User $user, Label $label): bool
    {
        return false;
    }
}
