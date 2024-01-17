<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class LeaverStatusType extends Enum
{
    const NONE = 0;
    const DISCONNECTED = 1;
    const DISCONNECTED_TOO_LONG = 2;
    const ABANDONED = 3;
    const AFK = 4;
    const NEVER_CONNECTED = 5;
    const NEVER_CONNECTED_TOO_LONG = 6;
    const FAILED_TO_READY_UP = 7;
    const DECLINED_READY_UP = 8;
}