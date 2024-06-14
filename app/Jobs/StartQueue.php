<?php

namespace App\Jobs;

use App\Traits\Jobs\HasCodyFighter;
use App\Models\CodyFighter;
use App\Services\CodyFight;
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
        /* $gamesPlayed = 0;

        $IsQueued = false;

        while ($gamesPlayed < $this->gamesToPlay)
        {
            //If you haven't queued the start queueing
            if (!$IsQueued) {
                $response = CodyFight::Init($this->codyFighter);
                if ($response->IsQueued()) $IsQueued = true;
                continue;
            }

            //Continuously check state
            $response = CodyFight::CheckState($this->codyFighter);

            //If a game hasn't begun and we are not queued then queue up
            if (!$response->IsGameOnGoing() || $IsQueued) {
               $IsQueued = true;

               return;
            }

             $IsQueued = false;

            //Is it my turn?
            if ($response->IsMyTurn()) {
                Context::TakeAction($response);
            }

        } */

        $response = CodyFight::Fake();
        dd($response);

        $going = $response->IsMyTurn();

        dd($going);
    }
}
