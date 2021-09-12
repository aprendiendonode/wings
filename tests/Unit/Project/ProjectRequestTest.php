<?php

use Domain\User\Models\User;
use App\Project\Requests\ProjectRequest;

test('it validate all project fields', function () {
    $user = User::factory()->create();

    $data = [
        'name' => 'My project',
        'description' => 'Lorem ipsum dolor sit amet',
        'user_id' => $user->id,
    ];

    $request = new ProjectRequest($data);

    $this->assertEquals($data, $request->validate($request->rules(), $data));
});
