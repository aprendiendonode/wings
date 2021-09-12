<?php

namespace Domain\Time\Subscribers;

use Illuminate\Events\Dispatcher;
use Domain\Time\Events\TimeSavingEvent;
use Domain\Time\Actions\CalculateTimeAction;

class TimeSubscriber
{
    public function __construct(
        private CalculateTimeAction $calculateTimeAction
    ) {
    }

    public function saving(TimeSavingEvent $event): void
    {
        $time = $event->time;

        $time->time = ($this->calculateTimeAction)($time);
    }

    public function subscribe(Dispatcher $dispatcher): void
    {
        $dispatcher->listen(
            TimeSavingEvent::class,
            self::class . '@saving'
        );
    }
}
