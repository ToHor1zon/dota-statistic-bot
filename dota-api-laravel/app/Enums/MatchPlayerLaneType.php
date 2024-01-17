<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchPlayerLaneType extends Enum
{
    const ROAMING = 0;
    const SAFE_LANE = 1;
    const MID_LANE = 2;
    const OFF_LANE = 3;
    const JUNGLE = 4;
    const UNKNOWN = 5;
}