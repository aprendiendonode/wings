<?php

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use App\Task\Policies\TaskPolicy;
use Domain\Project\Models\Project;

test('tasks can be listed', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);

    $this->assertEquals(true, $policy->viewAny($user, $project));
    $this->assertEquals(true, $policy->viewAny($project->members->first(), $project));
    $this->assertEquals(false, $policy->viewAny($other_user, $project));
});

test('task can be shown', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->view($user, $task));
    $this->assertEquals(true, $policy->view($project->members->first(), $task));
    $this->assertEquals(false, $policy->view($other_user, $task));
});

test('task can be created', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);

    $this->assertEquals(true, $policy->create($user, $project));
    $this->assertEquals(true, $policy->create($project->members->first(), $project));
    $this->assertEquals(false, $policy->create($other_user, $project));
});

test('task can be updated', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});

test('user can be a task assignee', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});

test('user can be a task reviewer', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});

test('task can be soft deleted', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});

test('task can be restored', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});

test('task can be force deleted', function () {
    $policy = new TaskPolicy();
    $user = User::factory()->create();
    $other_user = User::factory()->create();
    $project = Project::factory()
        ->hasMembers(1)
        ->create(['user_id' => $user->id]);
    $task = Task::factory()->create([
        'project_id' => $project->id,
        'user_id' => $user->id,
    ]);

    $this->assertEquals(true, $policy->update($user, $task));
    $this->assertEquals(true, $policy->update($project->members->first(), $task));
    $this->assertEquals(false, $policy->update($other_user, $task));
});
