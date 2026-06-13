<?php

namespace App\Policies;

use App\Models\Supplier;
use App\Models\User;

class SupplierPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Supplier $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Supplier $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function delete(User $user, Supplier $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function restore(User $user, Supplier $model): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Supplier $model): bool
    {
        return $user->role === 'admin';
    }
}