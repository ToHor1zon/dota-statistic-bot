<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class GameMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';

    protected $guarded = [];

    
    function players(): HasMany
    {
        return $this->hasMany(Player::class, 'match_id', 'id');
    }
}
