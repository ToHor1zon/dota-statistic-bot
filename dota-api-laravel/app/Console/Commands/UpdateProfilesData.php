<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Services\ApiStratz\SteamAccountService;
use App\Models\SteamAccount;
use Illuminate\Support\Facades\Log;

class UpdateSteamAccountsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'steam_accounts:update-data';

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
        $this->info('Command "steam_accounts:update-data" executed successfully.');

        $chunkedIds = SteamAccount::select('id')->get()->pluck('id')->chunk(5);

        $chunkedIds->each(function (Collection $chunk) {
            $steamAccountsData = SteamAccountService::getSteamAccountsProfileData($chunk->toArray());

            foreach ($steamAccountsData as $data) {
                $lastMatchData = $data['matches'][0];

                if (!$lastMatchData['statsDateTime']) {
                    return;
                }

                $steamAccount = SteamAccount::find($data['steamAccountId']);

                if ($lastMatchData['id'] == $steamAccount->last_match_id) {
                    return;
                }

                $steamAccount->last_match_id = $data['matches'][0]['id'];
                $steamAccount->name = $data['names'][0]['name'];
                $steamAccount->save();

                Log::info('UPDATED with id: ' . $steamAccount->id);
            }
        });
    }
}
