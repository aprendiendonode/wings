<?php

use Domain\Task\Models\Task;

test('the task status is open', function () {
    Task::factory()->isOpen()->create();
    Task::factory()->isInProgress()->create();

    $this->assertEquals(1, Task::query()->isOpen()->count());
});

test('the task status is in progress', function () {
    Task::factory()->isInProgress()->create();
    Task::factory()->isReviewed()->create();

    $this->assertEquals(1, Task::query()->isInProgress()->count());
});

test('the task status is reviewed', function () {
    Task::factory()->isReviewed()->create();
    Task::factory()->isClosed()->create();

    $this->assertEquals(1, Task::query()->isReviewed()->count());
});

test('the task status is closed', function () {
    Task::factory()->isClosed()->create();
    Task::factory()->isOpen()->create();

    $this->assertEquals(1, Task::query()->isClosed()->count());
});

test('the task is due', function () {
    Task::factory()->isDue()->create();
    Task::factory()->isNotDue()->create();

    $this->assertEquals(1, Task::query()->isDue()->count());
});

test('the task is not due', function () {
    Task::factory()->isNotDue()->create();

    $this->assertEquals(0, Task::query()->isDue()->count());
});
