<?php

use App\Task\Requests\TaskRequest;
use Domain\Project\Models\Project;
use Domain\Task\States\Open;

test('it validate all task fields', function () {
    $project = Project::factory()->create();

    $data = [
        'status' => Open::CODE,
        'name' => 'My task',
        'description' => 'Lorem ipsum dolor sit amet',
        'project_id' => $project->id,
    ];

    $request = new TaskRequest($data);

    $this->assertEquals($data, $request->validate($request->rules(), $data));
});
