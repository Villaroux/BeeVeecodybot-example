<?php

namespace App\Jobs;

use App\Traits\Jobs\HasCodyFighter;
use App\Models\CodyFighter;
use App\Services\Codyfight;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, HasCodyFighter;

    /**
     * Create a new job instance.
     */
    public function __construct(CodyFighter $codyFighter, protected int $gamesToPlay = 1)
    {
        $this->codyFighter = $codyFighter;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //While GamesToPlay > GamesPlayed Continue to play games (Queue,Game)
        $gamesPlayed = 0;

        $IsQueued = false;

        while ($gamesPlayed < $this->gamesToPlay)
        {
            if (!$IsQueued) {
                CodyFight::Init($this->codyFighter);
            }
        }
        //Start Queueing

        //Continuously check state

            //
    }
}
