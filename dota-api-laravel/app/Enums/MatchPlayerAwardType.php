<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MatchPlayerAwardType extends Enum
{
    const NONE = 0;
    const MVP = 1;
    const TOP_CORE = 2;
    const TOP_SUPPORT = 3;
}