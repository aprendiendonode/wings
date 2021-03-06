<?php

namespace Domain\Task\Actions;

use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Models\Task;

class CreateTaskAction
{
    public function __construct(
        public SaveTaskAction $saveTaskAction,
        public SendCreateTaskNotificationAction $sendCreateTaskNotificationAction,
    ) {
    }

    public function __invoke(TaskData $data): Task
    {
        $task = ($this->saveTaskAction)($data);

        ($this->sendCreateTaskNotificationAction)($task);

        return $task;
    }
}
