<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchPlayerRoleType extends Enum
{
    const CORE = 0;
    const LIGHT_SUPPORT = 1;
    const HARD_SUPPORT = 2;
    const UNKNOWN = 3;
}