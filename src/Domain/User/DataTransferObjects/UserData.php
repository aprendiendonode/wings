<?php

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $role;
    public Carbon $email_verified_at;
}
