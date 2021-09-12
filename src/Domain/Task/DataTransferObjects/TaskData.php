<?php

namespace Domain\Task\DataTransferObjects;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class TaskData extends DataTransferObject
{
    public int $status;
    public string $name;
    public ?string $description;
    public ?int $estimate_time;
    public ?Carbon $due_at;
    public int $project_id;
    public int $user_id;
}
