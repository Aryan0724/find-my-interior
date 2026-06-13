<?php

namespace App\Policies;

use App\Models\Worker;
use App\Models\User;

class WorkerPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Worker $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Worker $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function delete(User $user, Worker $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function restore(User $user, Worker $model): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Worker $model): bool
    {
        return $user->role === 'admin';
    }
}