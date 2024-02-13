<?php

namespace App\Services\ApiDB;

use App\Enums\LeaverStatusType;
use App\Enums\MatchPlayerAwardType;
use App\Enums\MatchPlayerLaneType;
use App\Enums\MatchPlayerPositionType;
use App\Enums\MatchPlayerRoleType;
use App\Models\Player;
use Carbon\Carbon;

use Exception;
use Illuminate\Support\Facades\Log;

class PlayerService
{
    public static function store(array $playersData)
    {
        try {
            foreach ($playersData as $playerData) {
                $player = Player::make([
                    'match_id' => $playerData['matchId'],
                    'player_slot' => $playerData['playerSlot'],
                    'steam_account_id' => $playerData['steamAccountId'],
                    'is_radiant' => $playerData['isRadiant'],
                    'is_victory' => $playerData['isVictory'],
                    'hero_id' => $playerData['heroId'],
                    'kills' => $playerData['kills'],
                    'deaths' => $playerData['deaths'],
                    'assists' => $playerData['assists'],
                    'leaver_status' => LeaverStatusType::fromKey($playerData['leaverStatus']),
                    'num_last_hits' => $playerData['numLastHits'],
                    'num_denies' => $playerData['numDenies'],
                    'gold_per_minute' => $playerData['goldPerMinute'],
                    'networth' => $playerData['networth'],
                    'experience_per_minute' => $playerData['experiencePerMinute'],
                    'level' => $playerData['level'],
                    'gold' => $playerData['gold'],
                    'gold_spent' => $playerData['goldSpent'],
                    'hero_damage' => $playerData['heroDamage'],
                    'tower_damage' => $playerData['towerDamage'],
                    'hero_healing' => $playerData['heroHealing'],
                    'party_id' => $playerData['partyId'],
                    'is_random' => $playerData['isRandom'],
                    'lane' => MatchPlayerLaneType::fromKey($playerData['lane']),
                    'position' => MatchPlayerPositionType::fromKey($playerData['position']),
                    'streak_prediction' => $playerData['streakPrediction'],
                    'intentional_feeding' => $playerData['intentionalFeeding'],
                    'role' => MatchPlayerRoleType::fromKey($playerData['role']),
                    'role_basic' => MatchPlayerRoleType::fromKey($playerData['roleBasic']),
                    'imp' => $playerData['imp'],
                    'award' => MatchPlayerAwardType::fromKey($playerData['award']),
                    'item_0_id' => $playerData['item0Id'],
                    'item_1_id' => $playerData['item1Id'],
                    'item_2_id' => $playerData['item2Id'],
                    'item_3_id' => $playerData['item3Id'],
                    'item_4_id' => $playerData['item4Id'],
                    'item_5_id' => $playerData['item5Id'],
                    'backpack_0_id' => $playerData['backpack0Id'],
                    'backpack_1_id' => $playerData['backpack1Id'],
                    'backpack_2_id' => $playerData['backpack2Id'],
                    'neutral_0_id' => $playerData['neutral0Id'],
                    'behavior' => $playerData['behavior'],
                    'invisible_seconds' => $playerData['invisibleSeconds'],
                    'dota_plus_hero_xp' => $playerData['dotaPlusHeroXp'],
                    'hero_display_name' => $playerData['hero']['displayName'],
                    'hero_short_name' => $playerData['hero']['shortName'],
                ]);
    
                $player->save();
    
                Log::info('Player with id: ' . $player->id . ' successfully created');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
