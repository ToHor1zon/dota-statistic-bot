<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchPlayerPositionNames extends Enum
{
    const CARRY = 0;
    const MID = 1;
    const HARD = 2;
    const SOFT_SUPPORT = 3;
    const HARD_SUPPORT = 4;
}