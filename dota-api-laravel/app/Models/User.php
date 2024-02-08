<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function discordServers(): BelongsToMany
    {
        return $this->belongsToMany(DiscordServer::class, 'discord_servers_users');
    }
}
