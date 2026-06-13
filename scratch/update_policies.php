<?php

$policiesDir = "d:/find my interior/findmyinterior-backend/app/Policies/";

function writePolicy($name, $model, $ownershipLogic) {
    global $policiesDir;
    $content = <<<PHP
<?php

namespace App\Policies;

use App\Models\\$model;
use App\Models\User;

class $name
{
    public function viewAny(?User \$user): bool
    {
        return true;
    }

    public function view(?User \$user, $model \$model): bool
    {
        return true;
    }

    public function create(User \$user): bool
    {
        return true;
    }

    public function update(User \$user, $model \$model): bool
    {
        return \$user->role === 'admin' || ($ownershipLogic);
    }

    public function delete(User \$user, $model \$model): bool
    {
        return \$user->role === 'admin' || ($ownershipLogic);
    }

    public function restore(User \$user, $model \$model): bool
    {
        return \$user->role === 'admin';
    }

    public function forceDelete(User \$user, $model \$model): bool
    {
        return \$user->role === 'admin';
    }
}
PHP;
    file_put_contents($policiesDir . $name . '.php', $content);
}

writePolicy('ListingPolicy', 'Listing', '$user->id === $model->user_id');
writePolicy('RequirementPolicy', 'Requirement', '$user->id === $model->user_id');
writePolicy('ReviewPolicy', 'Review', '$user->id === $model->user_id');
writePolicy('SupplierPolicy', 'Supplier', '$user->id === $model->user_id');
writePolicy('WorkerPolicy', 'Worker', '$user->id === $model->user_id');
writePolicy('BuilderProjectPolicy', 'BuilderProject', '$model->builder && $user->id === $model->builder->user_id');

echo "Policies updated.\n";
