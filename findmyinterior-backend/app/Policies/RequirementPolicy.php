<?php

namespace App\Policies;

use App\Models\Requirement;
use App\Models\User;

class RequirementPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Requirement $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Requirement $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function delete(User $user, Requirement $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function restore(User $user, Requirement $model): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Requirement $model): bool
    {
        return $user->role === 'admin';
    }
}