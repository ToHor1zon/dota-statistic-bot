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

use App\Services\ApiDB\DiscordServerService;

use Illuminate\Support\Facades\Http;

class GenerateMatchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $matchId;
    public $steamAccountId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $matchId)
    {
        $this->matchId = $matchId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Job GenerateMatchImage with matchId: ' . $this->matchId . ' executed');

        try {
            $match = GameMatch::where('id', $this->matchId)->with('players.steamAccount')->first();

            if (isset($match)) {
                DiscordServerService::sendFinallyImage($this->matchId);

                Log::info('Job GenerateMatchObject with matchId: ' . $this->matchId . ' successfully');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
