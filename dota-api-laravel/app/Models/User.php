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

    function steamAccounts(): hasMany
    {
        return $this->hasMany(SteamAccount::class, 'discord_user_id', 'discord_id');
    }
}
