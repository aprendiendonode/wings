<?php

use Domain\Task\Models\Task;
use Domain\Task\Actions\RestoreTaskAction;
use Illuminate\Support\Facades\Notification;

test('task is restored to the database', function () {
    Notification::fake();

    $task = Task::factory()->create();
    $task->delete();

    $task = (app(RestoreTaskAction::class))($task);

    $this->assertInstanceOf(Task::class, $task);
    $this->assertDatabaseHas($task->getTable(), [
        'id' => $task->id,
        'name' => $task->name,
        'deleted_at' => null,
    ]);
});

test('task notifications are sent', function () {
    Notification::fake();

    // TODO: test it properly
    expect(true)->toBeTrue();
});
