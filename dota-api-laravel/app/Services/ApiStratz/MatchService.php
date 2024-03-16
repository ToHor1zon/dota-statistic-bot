<?php

namespace App\Services\ApiStratz;

use Exception;
use App\Services\QraphQLService;
use Illuminate\Support\Facades\Log;

class MatchService
{
    public static function getMatchData(string $matchId)
    {
        try {
            return QraphQLService::get('
            {
                match(id: ' . $matchId . ') {
                    id
                    statsDateTime
                    durationSeconds
                    didRadiantWin
                    startDateTime
                    lobbyType
                    gameMode
                    averageRank
                    rank
                    radiantKills
                    direKills
                    bottomLaneOutcome
                    midLaneOutcome
                    topLaneOutcome
                    players {
                        matchId
                        playerSlot
                        steamAccountId
                        isRadiant
                        isVictory
                        heroId
                        kills
                        deaths
                        assists
                        leaverStatus
                        numLastHits
                        numDenies
                        goldPerMinute
                        networth
                        experiencePerMinute
                        level
                        gold
                        goldSpent
                        heroDamage
                        towerDamage
                        heroHealing
                        partyId
                        isRandom
                        lane
                        position
                        streakPrediction
                        intentionalFeeding
                        role
                        roleBasic
                        imp
                        award
                        item0Id
                        item1Id
                        item2Id
                        item3Id
                        item4Id
                        item5Id
                        backpack0Id
                        backpack1Id
                        backpack2Id
                        neutral0Id
                        behavior
                        invisibleSeconds
                        dotaPlusHeroXp
                        hero {
                            shortName
                            displayName
                        }
                    }
                }
            }
            ')['match'];
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
