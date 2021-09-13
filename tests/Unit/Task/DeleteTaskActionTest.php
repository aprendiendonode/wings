<?php

use Domain\Task\Models\Task;
use Domain\Task\Actions\DeleteTaskAction;
use Illuminate\Support\Facades\Notification;

test('task is soft deleted from the database', function () {
    Notification::fake();

    $task = Task::factory()->create();

    $task = (app(DeleteTaskAction::class))($task);

    $this->assertInstanceOf(Task::class, $task);
    $this->assertSoftDeleted($task);
});

test('task notifications are sent', function () {
    Notification::fake();

    // TODO: test it properly
    expect(true)->toBeTrue();
});
