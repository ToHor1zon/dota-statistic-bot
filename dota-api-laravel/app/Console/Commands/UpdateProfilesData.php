<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Services\PlayerService;
use App\Models\Player;

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
        $chunkedIds = Player::select('id')->get()->pluck('id')->chunk(5);

        $chunkedIds->each(function(Collection $chunk) {
            $playersData = PlayerService::getPlayersProfileData($chunk->toArray());
            foreach($playersData as $data) {
                Player::where('id', $data['steamAccountId'])->update(['last_match_id' => $data['matches'][0]['id']]);
            }
        });
    }
}
