<?php

namespace Support\Commands;

use Illuminate\Console\Command;
use Spatie\DbDumper\Databases\MySql;

class DatabaseDump extends Command
{
    protected $signature = 'db:dump';

    protected $description = 'Dump the database';

    public function handle()
    {
        MySql::create()
            ->setDbName(config('database.connections.mysql.database'))
            ->setUserName(config('database.connections.mysql.username'))
            ->setPassword(config('database.connections.mysql.password'))
            ->dumpToFile(storage_path('app/database_dump.sql'));

        $this->line('The database dump has been created.');

        return Command::SUCCESS;
    }
}
