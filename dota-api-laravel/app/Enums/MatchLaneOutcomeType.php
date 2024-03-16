<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchLaneOutcomeType extends Enum
{
    const TIE = 0;
    const RADIANT_VICTORY = 1;
    const RADIANT_STOMP = 2;
    const DIRE_VICTORY = 3;
    const DIRE_STOMP = 4;
}