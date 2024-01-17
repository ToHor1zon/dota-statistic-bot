<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchPlayerPositionType extends Enum
{
    const POSITION_1 = 0;
    const POSITION_2 = 1;
    const POSITION_3 = 2;
    const POSITION_4 = 3;
    const POSITION_5 = 4;
    const UNKNOWN = 5;
    const FILTERED = 6;
    const ALL = 7;
}