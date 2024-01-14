<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use App\Services\SteamAccountService;
use App\Models\SteamAccount;

class UpdateProfilesData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:add-new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for add new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
