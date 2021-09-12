<?php

namespace Domain\Task\Actions;

use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Models\Task;

class CreateTaskAction
{
    public function __construct(
        public SaveTaskAction $saveTaskAction,
        public SendTaskNotificationAction $sendTaskNotificationAction,
    ) {
    }

    public function __invoke(TaskData $data): Task
    {
        $task = ($this->saveTaskAction)($data);

        ($this->sendTaskNotificationAction)($task);

        return $task;
    }
}
