<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SnackTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'snack_id',
        'member_id',
    ];

    public function snack(): BelongsTo
    {
        return $this->belongsTo(Snack::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
