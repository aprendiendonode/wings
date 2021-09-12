<?php

use Domain\Task\States\Open;
use Domain\User\Models\User;
use App\Task\Requests\TaskRequest;
use Domain\Project\Models\Project;

test('it validate all task fields', function () {
    $project = Project::factory()->create();
    $user = User::factory()->create();

    $data = [
        'status' => Open::CODE,
        'name' => 'My task',
        'description' => 'Lorem ipsum dolor sit amet',
        'project_id' => $project->id,
        'user_id' => $user->id,
    ];

    $request = new TaskRequest($data);

    $this->assertEquals($data, $request->validate($request->rules(), $data));
});
