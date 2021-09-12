<?php

namespace Domain\Task\Collections;

use Domain\Task\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskCollection extends Collection
{
    public function open(): self
    {
        return Task::query()->isOpen()->get();
    }

    public function inProgress(): self
    {
        return Task::query()->isInProgress()->get();
    }

    public function reviewed(): self
    {
        return Task::query()->isReviewed()->get();
    }

    public function closed(): self
    {
        return Task::query()->isClosed()->get();
    }

    public function due(): self
    {
        return Task::query()->isDue()->get();
    }

    public function notDue(): self
    {
        return Task::query()->isNotDue()->get();
    }
}
