<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use App\Task\Notifications\TaskForceDeletedNotification;

class SendForceDeleteTaskNotificationAction
{
    public function __invoke(Task $task)
    {
        $task->project->members
            ->each(fn (User $user) => $user->notify(new TaskForceDeletedNotification($task)));
    }
}
