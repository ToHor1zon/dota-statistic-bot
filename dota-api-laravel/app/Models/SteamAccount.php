<?php

namespace App\Models;

use App\Models\GameMatch;
use App\Services\ApiStratz\MatchService as StratzMatchService;
use App\Services\ApiDB\MatchService as DBMatchService;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

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
            try {
                $hasMatch = GameMatch::find($model->last_match_id);

                if (!$hasMatch) {
                    $matchData = StratzMatchService::getMatchData($model->last_match_id);

                    DBMatchService::store($matchData);
                }
            } catch (Exception $e) {
                Log::error($e);
            }
        });
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'discord_user_id', 'discord_id');
    }
}