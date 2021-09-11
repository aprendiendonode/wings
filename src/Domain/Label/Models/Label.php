<?php

namespace Domain\Label\Models;

use Database\Factories\LabelFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\ModelStates\HasStates as HasColors;

class Label extends Model
{
    use HasFactory;
    use HasColors;
    use SoftDeletes;

    public static function newFactory(): LabelFactory
    {
        return new LabelFactory();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function projects(): MorphToMany
    {
        return $this->morphedByMany(Project::class, 'labellable');
    }

    public function tasks(): MorphToMany
    {
        return $this->morphedByMany(Task::class, 'labellable');
    }
}
