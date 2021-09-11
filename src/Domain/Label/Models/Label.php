<?php

namespace Domain\Label\Models;

use Illuminate\Support\Str;
use Domain\Label\Colors\LabelColor;
use Database\Factories\LabelFactory;
use Illuminate\Database\Eloquent\Model;
use Domain\Label\Collections\LabelCollection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStates\HasStates as HasColors;
use Domain\Label\QueryBuilders\LabelQueryBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Label extends Model
{
    use HasFactory;
    use HasColors;
    use SoftDeletes;

    public static function newFactory(): LabelFactory
    {
        return new LabelFactory();
    }

    public function newEloquentBuilder($query): LabelQueryBuilder
    {
        return new LabelQueryBuilder($query);
    }

    public function newCollection(array $models = []): LabelCollection
    {
        return new LabelCollection($models);
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

    public function getColor(): LabelColor
    {
        $color = Str::camel($this->color);

        return new $color($this);
    }
}
