<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'recurrent',
        'snack_time',
        'user_id',
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function snacks(): HasMany
    {
        return $this->hasMany(Snack::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
