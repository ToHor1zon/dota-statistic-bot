<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    protected $fillable = [
        'id',
        'name',
        'discord_user_id',
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'discord_user_id', 'discord_id');
    }
}

