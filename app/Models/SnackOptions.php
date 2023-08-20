<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SnackOptions extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'snack_item_id'];

    public function snackItems(): BelongsTo
    {
        return $this->belongsTo(SnackItems::class, 'snack_item_id');
    }
}
