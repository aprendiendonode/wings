<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;

class ForceDeleteTaskAction
{
    public function __construct(
        public SendForceDeleteTaskNotificationAction $sendForceDeleteTaskNotificationAction,
    ) {
    }

    public function __invoke(Task $task): Task
    {
        $task->forceDelete();

        ($this->sendForceDeleteTaskNotificationAction)($task);

        return $task;
    }
}
