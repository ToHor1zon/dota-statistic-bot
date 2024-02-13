<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Enums\GameModeType as GameModeTypeEnum;

class GameMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $guarded = [];

    public function matchType(): Attribute
    {
        return new Attribute(
            get: fn () => GameModeTypeEnum::fromValue($this->game_mode_type_id)->description,
        );  
    }

    public function durationFormated(): Attribute
    {
        $duration = $this->duration;
        $minutes = floor($duration / 60);
        $remainderSeconds = $duration % 60;

        return new Attribute(
            get: fn () => "{$minutes}:{$remainderSeconds}",
        );  
    }

    public function getUpperAttribute()
    {
        return strtoupper($this->match_id);    
    }
    
    function players(): HasMany
    {
        return $this->hasMany(Player::class, 'id', 'match_id');
    }
}
