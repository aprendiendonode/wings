<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;
use Domain\User\Models\User;
use App\Task\Notifications\TaskDeletedNotification;

class SendDeleteTaskNotificationAction
{
    public function __invoke(Task $task)
    {
        $task->project->members
            ->each(fn (User $user) => $user->notify(new TaskDeletedNotification($task)));
    }
}
