<?php

namespace App\Models;

use App\Jobs\SaveNewMatchDataFromAPI;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Support\Facades\Log;

class SteamAccount extends Model
{
    protected $fillable = [
        'id',
        'name',
        'discord_user_id',
        'last_match_id',
    ];

    protected static function booted()
    {
        parent::booted();

        static::updated(function ($model) {
           SaveNewMatchDataFromAPI::dispatch($model->last_match_id, $model->id);
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
