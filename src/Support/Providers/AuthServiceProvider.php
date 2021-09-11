<?php

namespace Support\Providers;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use Domain\Label\Models\Label;
use Domain\Project\Models\Project;
use App\Task\Policies\TaskPolicy;
use App\User\Policies\UserPolicy;
use App\Label\Policies\LabelPolicy;
use App\Project\Policies\ProjectPolicy;
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
