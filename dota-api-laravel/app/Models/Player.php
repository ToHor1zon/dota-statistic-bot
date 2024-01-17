<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $guarded = [];
    
    function match(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'match_id');
    }
}
