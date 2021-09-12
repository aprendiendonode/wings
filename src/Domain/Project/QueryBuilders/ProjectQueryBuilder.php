<?php

namespace Domain\Project\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ProjectQueryBuilder extends Builder
{
    public function isDue(): self
    {
        return $this->where('due_at', '<=', now());
    }

    public function isNotDue(): self
    {
        return $this->where('due_at', '>', now());
    }
}
