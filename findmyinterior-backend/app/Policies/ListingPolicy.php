<?php

namespace App\Policies;

use App\Models\Listing;
use App\Models\User;

class ListingPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Listing $model): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Listing $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function delete(User $user, Listing $model): bool
    {
        return $user->role === 'admin' || ($user->id === $model->user_id);
    }

    public function restore(User $user, Listing $model): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Listing $model): bool
    {
        return $user->role === 'admin';
    }
}