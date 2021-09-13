<?php

namespace Domain\Task\Actions;

use Domain\Task\Models\Task;

class DeleteTaskAction
{
    public function __construct(
        public SendDeleteTaskNotificationAction $sendDeleteTaskNotificationAction,
    ) {
    }

    public function __invoke(Task $task): Task
    {
        $task->delete();

        ($this->sendDeleteTaskNotificationAction)($task);

        return $task;
    }
}
