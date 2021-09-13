<?php

use Domain\Task\Models\Task;
use Illuminate\Support\Facades\Notification;
use Domain\Task\Actions\ForceDeleteTaskAction;

test('task is force deleted from the database', function () {
    Notification::fake();

    $task = Task::factory()->create();

    $task = (app(ForceDeleteTaskAction::class))($task);

    $this->assertInstanceOf(Task::class, $task);
    $this->assertDeleted($task);
});

test('task notifications are sent', function () {
    Notification::fake();

    // TODO: test it properly
    expect(true)->toBeTrue();
});
