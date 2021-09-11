<?php

namespace Support\Kernels;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class Console extends Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:prune-batches --hours=48')->daily();
        $schedule->command('queue:prune-failed --hours=48')->daily();
        $schedule->command('auth:clear-resets users')->daily();
        $schedule->command('telescope:prune --hours=48')->daily();
        $schedule->command('notifications:prune --days=30')->daily();
        $schedule->command('backup:clean')->daily();
        $schedule->command('backup:run')->daily()->at('01:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(dirname(__DIR__) . '/Commands');

        require base_path('routes/console.php');
    }
}
