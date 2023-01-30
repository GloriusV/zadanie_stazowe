<?php

namespace App\Providers;


use App\Enums\UserRole;
use app\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->GateUserRole('isAdmin', UserRole::ADMIN);

        $this->GateUserRole('isUser', UserRole::USER);

    }

    private function GateUserRole(string $name, string $role){

        Gate::define($name, function (User $user) use ($role) {
            return $user->role = $role;

        });

    }
}
