<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'discord_id',
    ];

    function players(): hasMany
    {
        return $this->hasMany(Player::class, 'discord_user_id', 'discord_id');
    }
}
