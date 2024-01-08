<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Services\ApiStratz\PlayerService;
use App\Models\Player;
use Illuminate\Support\Facades\Log;

class UpdateProfilesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profiles:update-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for updating all dota profiles data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Command "profiles:update-data" executed successfully.');

        $chunkedIds = Player::select('id')->get()->pluck('id')->chunk(5);

        $chunkedIds->each(function (Collection $chunk) {
            $playersData = PlayerService::getPlayersProfileData($chunk->toArray());

            foreach ($playersData as $data) {
                $lastMatchData = $data['matches'][0];

                if (!$lastMatchData['statsDateTime']) {
                    return;
                }

                $player = Player::find($data['steamAccountId']);

                if ($lastMatchData['id'] == $player->last_match_id) {
                    return;
                }

                $player->last_match_id = $data['matches'][0]['id'];
                $player->name = $data['names'][0]['name'];
                $player->save();

                Log::info('UPDATED with id: ' . $player->id);
            }
        });
    }
}
