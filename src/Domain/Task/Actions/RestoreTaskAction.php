<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;

class RestoreTaskAction
{
    public function __construct(
        public SendRestoreTaskNotificationAction $sendRestoreTaskNotificationAction,
    ) {
    }

    public function __invoke(Task $task): Task
    {
        $task->restore();

        ($this->sendRestoreTaskNotificationAction)($task);

        return $task;
    }
}
