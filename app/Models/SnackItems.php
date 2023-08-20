<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SnackItems extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function snackOptions(): HasMany
    {
        return $this->hasMany(SnackOptions::class, 'snack_item_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
