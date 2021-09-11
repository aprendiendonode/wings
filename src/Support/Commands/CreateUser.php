<?php

namespace Support\Commands;

use Illuminate\Console\Command;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateUser extends Command
{
    protected $signature = 'users:create
                                {username : The username}
                                {email : The email}
                                {password : The password}';

    protected $description = 'Create user';

    public function handle(CreatesNewUsers $creator): int
    {
        event(new Registered($creator->create($this->arguments())));

        return Command::SUCCESS;
    }
}
