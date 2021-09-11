<?php

use Domain\Project\Models\Project;

test('the project is due', function () {
    Project::factory()->isDue()->create();
    Project::factory()->isNotDue()->create();

    $this->assertEquals(1, Project::query()->isDue()->count());
});

test('the project is not due', function () {
    Project::factory()->isNotDue()->create();

    $this->assertEquals(0, Project::query()->isDue()->count());
});
