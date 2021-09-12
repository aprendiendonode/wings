<?php

use Domain\Task\Models\Task;
use Domain\Task\Collections\TaskCollection;

test('the task status is open', function () {
    Task::factory()->isOpen()->create();
    Task::factory()->isInProgress()->create();

    $this->assertEquals(1, (new TaskCollection())->open()->count());
});

test('the task status is in progress', function () {
    Task::factory()->isInProgress()->create();
    Task::factory()->isReviewed()->create();

    $this->assertEquals(1, (new TaskCollection())->inProgress()->count());
});

test('the task status is reviewed', function () {
    Task::factory()->isReviewed()->create();
    Task::factory()->isClosed()->create();

    $this->assertEquals(1, (new TaskCollection())->reviewed()->count());
});

test('the task status is closed', function () {
    Task::factory()->isClosed()->create();
    Task::factory()->isOpen()->create();

    $this->assertEquals(1, (new TaskCollection())->closed()->count());
});

test('the task is due', function () {
    Task::factory()->isDue()->create();
    Task::factory()->isNotDue()->create();

    $this->assertEquals(1, (new TaskCollection())->due()->count());
});

test('the task is not due', function () {
    Task::factory()->isDue()->create();
    Task::factory()->isNotDue()->create();

    $this->assertEquals(1, (new TaskCollection())->notDue()->count());
});
