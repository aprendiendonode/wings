<?php

use Domain\Project\Collections\ProjectCollection;
use Domain\Project\Models\Project;

test('the project is due', function () {
    Project::factory()->isDue()->create();
    Project::factory()->isNotDue()->create();

    $this->assertEquals(1, (new ProjectCollection())->due()->count());
});

test('the project is not due', function () {
    Project::factory()->isDue()->create();
    Project::factory()->isNotDue()->create();

    $this->assertEquals(1, (new ProjectCollection())->notDue()->count());
});
