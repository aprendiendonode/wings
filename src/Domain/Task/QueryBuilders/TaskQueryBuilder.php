<?php

namespace Domain\Task\QueryBuilders;

use Domain\Task\States\Open;
use Domain\Task\States\Closed;
use Domain\Task\States\Reviewed;
use Domain\Task\States\InProgress;
use Illuminate\Database\Eloquent\Builder;

class TaskQueryBuilder extends Builder
{
    public function statusIs(int $status): self
    {
        return $this->where('status', $status);
    }

    public function isOpen(): self
    {
        return $this->statusIs(Open::CODE);
    }

    public function isInProgress(): self
    {
        return $this->statusIs(InProgress::CODE);
    }

    public function isReviewed(): self
    {
        return $this->statusIs(Reviewed::CODE);
    }

    public function isClosed(): self
    {
        return $this->statusIs(Closed::CODE);
    }

    public function isDue(): self
    {
        return $this->where('due_at', '<=', now());
    }

    public function isNotDue(): self
    {
        return $this->where('due_at', '>', now());
    }
}
