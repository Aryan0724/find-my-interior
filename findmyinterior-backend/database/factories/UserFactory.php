<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Configure the factory to attach roles after creation.
     * Intercepts the 'roles' key (not a DB column) and assigns them via pivot.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            // 'roles' is not a real column — attach via the pivot relationship
            if (!empty($user->_factory_roles)) {
                foreach ($user->_factory_roles as $slug) {
                    $role = Role::firstOrCreate(['slug' => $slug], ['name' => ucfirst($slug)]);
                    $user->roles()->syncWithoutDetaching([$role->id]);
                }
            }
        });
    }

    /**
     * Produce a state for the given roles so the factory can intercept them
     * without writing to the users DB column.
     */
    public function withRoles(array $roles): static
    {
        return $this->state(function (array $attributes) use ($roles) {
            // Store as temporary attribute — configure() will pick it up
            return ['_factory_roles' => $roles];
        });
    }
}
