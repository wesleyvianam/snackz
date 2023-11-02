<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'snack_id',
        'user_id',
        'workspace_id',
        'recurrent',
        'quantity'
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
