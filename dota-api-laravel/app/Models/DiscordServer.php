<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DiscordServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'channel_id'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'discord_servers_users');
    }
}
