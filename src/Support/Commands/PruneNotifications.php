<?php

namespace Support\Commands;

use Illuminate\Console\Command;
use Illuminate\Notifications\DatabaseNotification;

class PruneNotifications extends Command
{
    protected $signature = 'notifications:prune {--days=}';

    protected $description = 'Prune notifications';

    public function handle(): int
    {
        DatabaseNotification::whereNotNull('read_at')
            ->where(
                'created_at',
                '>',
                now()->subDays($this->option('days'))
            )->delete();

        return Command::SUCCESS;
    }
}
