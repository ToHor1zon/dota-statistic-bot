<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

use App\Enums\GameModeType as GameModeTypeEnum;
use App\Jobs\GenerateMatchImage;

use Illuminate\Support\Facades\Log;

class GameMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $guarded = [];

    public $incrementing = false;
    
    protected static function booted()
    {
        static::created(function (GameMatch $model) {
            Log::info('GameModel $model:', $model->toArray());
            try {
                Log::info('Hook created() is called for model ' . get_class($model) . ' with ID ' . $model->id);
                GenerateMatchImage::dispatch($model->id);
            } catch (\Error $e) {
                Log::error($e);
            }
        });
    }

    public function matchType(): Attribute
    {
        return new Attribute(
            get: fn () => GameModeTypeEnum::fromValue($this->game_mode_type_id)->description,
        );  
    }

    public function durationFormated(): Attribute
    {
        $duration = $this->duration;

        $time_in_minutes = gmdate("i:s", $duration); // Преобразование секунд в формат минут:секунд
        [ $minutes, $seconds ] = explode(':', $time_in_minutes);

        return new Attribute(
            get: fn () => sprintf('%02d:%02d', $minutes, $seconds),
        );  
    }

    public function getUpperAttribute()
    {
        return strtoupper($this->match_id);    
    }
    
    function players(): HasMany
    {
        return $this->hasMany(Player::class, 'match_id', 'id');
    }
}
