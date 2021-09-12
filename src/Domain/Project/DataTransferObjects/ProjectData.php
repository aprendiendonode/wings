<?php

namespace Domain\Project\DataTransferObjects;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class ProjectData extends DataTransferObject
{
    public string $name;
    public string $description;
    public int $estimate_time;
    public Carbon $due_at;
}
