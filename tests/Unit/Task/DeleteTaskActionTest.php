<?php

use Domain\Task\Models\Task;
use Domain\Task\Actions\DeleteTaskAction;

test('task is soft deleted from the database', function () {
    $task = Task::factory()->create();

    $task = (app(DeleteTaskAction::class))($task);

    $this->assertInstanceOf(Task::class, $task);
    $this->assertSoftDeleted($task);
});

test('task notifications are sent', function () {
    // TODO: test it properly
    expect(true)->toBeTrue();
});
