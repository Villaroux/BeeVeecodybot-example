<?php

namespace App\Jobs;

use App\CodyFight\Entities\CodyFighter;
use App\Services\CodyFight;
use App\Strategies\Context;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckState implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public CodyFighter $codyFighter)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Get CheckState
        $response = CodyFight::CheckState($this->codyFighter);

        if ($response->gameState->IsGameOnGoing()) {
            //GameIsOnGoing
            Context::TakeAction($response);
        }

        if ($response->gameState->HasGameEnded()) {
            //Game Ended - Restart If
            StartQueue::dispatch($this->codyFighter)->onQueue('codyfighters');
        }

        //Repeat job
        CheckState::dispatch($this->codyFighter)->onQueue('codyfighters');
    }
}
