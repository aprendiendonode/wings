<?php

use App\Label\Requests\LabelRequest;

test('it validate all label fields', function () {
    $data = [
        'name' => 'My Label',
        'description' => 'Lorem ipsum dolor sit amet',
        'color' => 'black',
    ];

    $request = new LabelRequest($data);

    $this->assertEquals($data, $request->validate($request->rules(), $data));
});
