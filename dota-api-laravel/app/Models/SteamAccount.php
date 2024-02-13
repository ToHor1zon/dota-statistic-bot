<?php

namespace App\Models;

use App\Jobs\SaveNewMatchDataFromAPI;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SteamAccount extends Model
{
    protected $fillable = [
        'id',
        'name',
        'discord_user_id',
        'last_match_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($model) {
            SaveNewMatchDataFromAPI::dispatch($model->last_match_id);
        });
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'discord_user_id', 'discord_id');
    }

    function players(): HasMany
    {
        return $this->hasMany(Player::class, 'steam_account_id', 'id');
    }
}
