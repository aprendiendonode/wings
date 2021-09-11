<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Label extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const COLORS = [
        ['foreground' => 'gray-100', 'background' => 'gray-700'],
    ];

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
