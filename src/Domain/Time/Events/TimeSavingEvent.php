<?php

namespace Domain\Time\Events;

use Domain\Time\Models\Time;

class TimeSavingEvent
{
    public function __construct(
        public Time $time
    ) {
    }
}
