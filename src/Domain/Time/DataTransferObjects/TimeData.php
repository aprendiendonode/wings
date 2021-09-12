<?php

namespace Domain\Time\DataTransferObjects;

use Carbon\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class TimeData extends DataTransferObject
{
    public Carbon $start_at;
    public Carbon $end_at;
    public int $time;
}
