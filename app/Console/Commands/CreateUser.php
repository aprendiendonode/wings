<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    protected $signature = 'users:create
                                {username : The username}
                                {email : The email}
                                {password : The password}';

    protected $description = 'Create user';

    public function handle(): int
    {
        $user = new User();

        $user->name = $this->argument('username');
        $user->email = $this->argument('email');
        $user->password = bcrypt($this->argument('password'));
        $user->email_verified_at = now();

        $user->save();

        return Command::SUCCESS;
    }
}
