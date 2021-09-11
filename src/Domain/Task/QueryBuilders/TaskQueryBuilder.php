<?php

namespace Domain\Task\QueryBuilders;

use Domain\Task\States\Open;
use Domain\Task\States\Closed;
use Domain\Task\States\Reviewed;
use Domain\Task\States\InProgress;
use Illuminate\Database\Eloquent\Builder;

class TaskQueryBuilder extends Builder
{
    public function statusIs(int $status): Builder
    {
        return $this->where('status', $status);
    }

    public function isOpen(): Builder
    {
        return $this->statusIs(Open::CODE);
    }

    public function scopeIsInProgress(): Builder
    {
        return $this->statusIs(InProgress::CODE);
    }

    public function isReviewed(): Builder
    {
        return $this->statusIs(Reviewed::CODE);
    }

    public function isClosed(): Builder
    {
        return $this->statusIs(Closed::CODE);
    }

    public function isDue(): Builder
    {
        return $this->where('due_at', '<=', now());
    }
}
