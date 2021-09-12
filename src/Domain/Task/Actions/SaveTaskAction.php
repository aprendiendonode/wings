<?php

namespace Domain\Task\Actions;

use Domain\Task\DataTransferObjects\TaskData;
use Domain\Task\Models\Task;

class SaveTaskAction
{
    public function __invoke(TaskData $data): Task
    {
        return Task::create([
            'status' => $data->status,
            'name' => $data->name,
            'description' => $data->description,
            'estimate_time' => $data->estimate_time,
            'due_at' => $data->due_at,
            'project_id' => $data->project_id,
            'user_id' => $data->user_id,
        ]);
    }
}
