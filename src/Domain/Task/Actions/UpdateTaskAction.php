<?php

namespace Domain\Task\Actions;

use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Models\Task;

class UpdateTaskAction
{
    public function __construct(
        public SaveTaskAction $saveTaskAction,
        public SendUpdateTaskNotificationAction $sendUpdateTaskNotificationAction,
    ) {
    }

    public function __invoke(Task $task, TaskData $data): Task
    {
        $task = ($this->saveTaskAction)($data, $task);

        ($this->sendUpdateTaskNotificationAction)($task);

        return $task;
    }
}
