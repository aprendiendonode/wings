<?php

namespace Domain\Time\Actions;

use Domain\Time\Models\Time;

class CalculateTimeAction
{
    public function __invoke(Time $time): int
    {
        return $time->end_at->diffInMinutes($time->start_at);
    }
}
