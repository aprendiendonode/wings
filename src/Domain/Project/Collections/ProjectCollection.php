<?php

namespace Domain\Project\Collections;

use Domain\Project\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectCollection extends Collection
{
    public function due(): self
    {
        return Project::query()->isDue()->get();
    }

    public function notDue(): self
    {
        return Project::query()->isNotDue()->get();
    }
}
