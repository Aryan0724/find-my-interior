<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce explicit morph mapping for polymorphic relations
        // This decouples the database "type" column from our internal fully qualified class names.
        Relation::enforceMorphMap([
            'Listing'        => 'App\Models\Listing',
            'Builder'        => 'App\Models\Builder',
            'BuilderProject' => 'App\Models\BuilderProject',
            'Supplier'       => 'App\Models\Supplier',
            'Worker'         => 'App\Models\Worker',
            'Blog'           => 'App\Models\Blog',
            'User'           => 'App\Models\User',
        ]);
    }
}
