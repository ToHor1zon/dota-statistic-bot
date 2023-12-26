<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'discord_user_id',
    ];

    function players(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
