<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Applicants gates
        Gate::define('add-applicant-score', function ($user) {
            return collect(['super', 'intermediate'])->contains($user->admin->permission_level);
        });

        Gate::define('delete-all-applicants', function ($user) {
            return collect(['super'])->contains($user->admin->permission_level);
        });

        
    }
}
