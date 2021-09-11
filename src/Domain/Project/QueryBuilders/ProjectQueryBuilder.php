<?php

namespace Domain\Label\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ProjectQueryBuilder extends Builder
{
    public function isDue(): Builder
    {
        return $this->where('due_at', '<=', now());
    }
}
