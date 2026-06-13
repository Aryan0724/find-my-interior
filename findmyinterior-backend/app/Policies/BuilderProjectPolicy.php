<?php

namespace App\Policies;

use App\Models\BuilderProject;
use App\Models\User;

class BuilderProjectPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, BuilderProject $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, BuilderProject $model): bool
    {
        return $user->role === 'admin' || ($model->builder && $user->id === $model->builder->user_id);
    }

    public function delete(User $user, BuilderProject $model): bool
    {
        return $user->role === 'admin' || ($model->builder && $user->id === $model->builder->user_id);
    }

    public function restore(User $user, BuilderProject $model): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, BuilderProject $model): bool
    {
        return $user->role === 'admin';
    }
}