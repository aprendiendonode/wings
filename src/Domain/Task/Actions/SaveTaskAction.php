<?php

namespace Domain\Task\Actions;

use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Models\Task;

class SaveTaskAction
{
    public function __invoke(TaskData $data, ?Task $task = null): Task
    {
        if ($task === null) {
            $task = new Task();
        }

        $task->status = $data->status;
        $task->name = $data->name;
        $task->description = $data->description;
        $task->estimate_time = $data->estimate_time;
        $task->due_at = $data->due_at;
        $task->project_id = $data->project_id;
        $task->user_id = $data->user_id;

        $task->save();

        return $task;
    }
}
