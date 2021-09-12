<?php

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use App\Time\Requests\TimeRequest;

test('it validate all time fields', function () {
    $task = Task::factory()->create();
    $user = User::factory()->create();

    $data = [
        'start_at' => now(),
        'end_at' => now()->addHours(2),
        'task_id' => $task->id,
        'user_id' => $user->id,
    ];

    $request = new TimeRequest($data);

    $this->assertEquals($data, $request->validate($request->rules(), $data));
});
