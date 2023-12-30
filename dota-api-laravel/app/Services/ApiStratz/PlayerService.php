<?php

namespace App\Services\ApiStratz;

use Exception;
use App\Services\QraphQLService;

class PlayerService
{
    public static function getPlayerProfileData(string $steamAccountId)
    {
        try {
            return QraphQLService::get('
                {
                    player(steamAccountId: ' . $steamAccountId . ') {
                    steamAccountId
                    }
                }
            ');
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function getPlayersProfileData(array $steamAccountIds)
    {
        try {
            return QraphQLService::get('
                {
                    players(steamAccountIds: [' . implode(', ', $steamAccountIds) . ']) {
                    steamAccountId
                    matches(request: {isParsed: true, lobbyTypeIds: [0, 1, 7]}) {
                        id
                    }
                    }
                }
            ')['players'];
        } catch (Exception $e) {
            throw $e;
        }
    }
}
