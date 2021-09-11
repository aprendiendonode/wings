<?php

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class TaskData extends DataTransferObject
{
    public int $status;
    public string $name;
    public string $description;
    public int $estimate_time;
    public Carbon $due_at;
}
