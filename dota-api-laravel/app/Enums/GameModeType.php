<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class GameModeType extends Enum
{
    const NONE = 0;
    const ALL_PICK = 1;
    const CAPTAINS_MODE = 2;
    const RANDOM_DRAFT = 3;
    const SINGLE_DRAFT = 4;
    const ALL_RANDOM = 5;
    const INTRO = 6;
    const THE_DIRETIDE = 7;
    const REVERSE_CAPTAINS_MODE = 8;
    const THE_GREEVILING = 9;
    const TUTORIAL = 10;
    const MID_ONLY = 11;
    const LEAST_PLAYED = 12;
    const NEW_PLAYER_POOL = 13;
    const COMPENDIUM_MATCHMAKING = 14;
    const CUSTOM = 15;
    const CAPTAINS_DRAFT = 16;
    const BALANCED_DRAFT = 17;
    const ABILITY_DRAFT = 18;
    const EVENT = 19;
    const ALL_RANDOM_DEATH_MATCH = 20;
    const SOLO_MID = 21;
    const ALL_PICK_RANKED = 22;
    const TURBO = 23;
    const MUTATION = 24;
    const UNKNOWN = 25;
}
