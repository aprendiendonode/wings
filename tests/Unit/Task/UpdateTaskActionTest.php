<?php

use Domain\Task\Models\Task;
use Domain\Task\States\Open;
use Domain\User\Models\User;
use Domain\Project\Models\Project;
use Domain\Task\Actions\SaveTaskAction;
use Illuminate\Support\Facades\Notification;
use Domain\Task\DataTransferObjects\TaskData;

test('task is saved to the database', function () {
    $user = User::factory()->create();
    $project = Project::factory()->create();
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);
    $data = new TaskData(
        status: Open::CODE,
        name: 'My Task',
        description: 'Lorem ipsum dolor sit amet',
        project_id: $project->id,
        user_id: $user->id,
    );

    $task = (app(SaveTaskAction::class))($data, $task);

    $this->assertInstanceOf(Task::class, $task);
    $this->assertDatabaseHas($task->getTable(), $data->toArray());
});

test('task notifications are sent', function () {
    Notification::fake();

    // TODO: test it properly
    expect(true)->toBeTrue();
});
