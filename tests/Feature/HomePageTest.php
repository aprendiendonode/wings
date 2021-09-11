<?php

use Illuminate\Http\Response;

it('doesn\'t have an home page', function () {
    $response = $this->get('/');

    $response->assertStatus(Response::HTTP_NOT_FOUND);
});
