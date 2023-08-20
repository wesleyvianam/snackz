<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnackOptions extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'snack_item_id'];
}
