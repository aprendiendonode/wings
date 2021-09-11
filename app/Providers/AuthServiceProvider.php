<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\User;
use App\Models\Label;
use App\Models\Project;
use App\Policies\TaskPolicy;
use App\Policies\UserPolicy;
use App\Policies\LabelPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Label::class => LabelPolicy::class,
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
