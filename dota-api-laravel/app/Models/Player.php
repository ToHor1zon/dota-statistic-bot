<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $guarded = [];
    
    function match(): BelongsTo
    {
        return $this->belongsTo(GameMatch::class, 'match_id', 'id');
    }

    function steamAccount(): HasOne
    {
        return $this->hasOne(SteamAccount::class, 'id', 'steam_account_id');
    }
}
