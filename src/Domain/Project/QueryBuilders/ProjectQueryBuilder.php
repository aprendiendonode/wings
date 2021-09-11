<?php

namespace Domain\Project\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ProjectQueryBuilder extends Builder
{
    public function isDue(): Builder
    {
        return $this->where('due_at', '<=', now());
    }
}
