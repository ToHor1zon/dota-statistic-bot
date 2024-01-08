<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class LobbyType extends Enum
{
    const UNRANKED = 0;
    const PRACTICE = 1;
    const TOURNAMENT = 2;
    const TUTORIAL = 3;
    const COOP_VS_BOTS = 4;
    const TEAM_MATCH = 5;
    const SOLO_QUEUE = 6;
    const RANKED = 7;
    const SOLO_MID = 8;
    const BATTLE_CUP = 9;
    const EVENT = 10;
    const DIRE_TIDE = 11;
}