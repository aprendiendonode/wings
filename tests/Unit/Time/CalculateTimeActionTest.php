<?php

use Domain\Time\Actions\CalculateTimeAction;
use Domain\Time\Models\Time;

test('time between start_at and end_at is calculated for time', function () {
    $time = Time::factory()->ofTwoHours()->create();

    $this->assertEquals(
        120,
        (new CalculateTimeAction())($time)
    );
});
