<?php

use Domain\Task\Models\Task;
use Domain\Task\States\Closed;
use Domain\Task\States\InProgress;
use Domain\Task\States\Open;
use Domain\Task\States\Reviewed;

test('the status code of an open task is ' . Open::CODE, function () {
    $state = new Open(new Task());

    $this->assertEquals(Open::CODE, $state->getCode());
});

test('the status code of an in progress task is ' . InProgress::CODE, function () {
    $state = new InProgress(new Task());

    $this->assertEquals(InProgress::CODE, $state->getCode());
});

test('the status code of an reviewed task is ' . Reviewed::CODE, function () {
    $state = new Reviewed(new Task());

    $this->assertEquals(Reviewed::CODE, $state->getCode());
});

test('the status code of an closed task is ' . Closed::CODE, function () {
    $state = new Closed(new Task());

    $this->assertEquals(Closed::CODE, $state->getCode());
});
