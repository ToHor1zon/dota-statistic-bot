<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

use Illuminate\Support\Facades\Log;
use App\Models\GameMatch;
use App\Services\ApiStratz\MatchService as StratzMatchService;
use App\Services\ApiDB\MatchService as DBMatchService;
use App\Services\ApiDB\PlayerService as DBPlayerService;

class SaveNewMatchDataFromAPI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $matchId;
    public $steamAccountId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $matchId, int $steamAccountId)
    {
        $this->matchId = $matchId;
        $this->steamAccountId = $steamAccountId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Job SaveNewMatchDataFromAPI with lastMatchId: ' . $this->matchId . ' executed successfully.');

        try {
            $hasMatch = GameMatch::find($this->matchId);

            if (!$hasMatch) {
                $matchData = StratzMatchService::getMatchData($this->matchId);

                Log::info(json_encode($matchData['players']));
                DBPlayerService::store($matchData['players']);
                DBMatchService::store($matchData);

                Log::info('Match ' . $matchData['id'] . ' and players successfully saved');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
