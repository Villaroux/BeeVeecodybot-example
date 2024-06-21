<?php

namespace App\Jobs;

use App\Traits\Jobs\HasCodyFighter;
use App\CodyFight\Entities\CodyFighter;
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
        //TODO:: Finish job rotation to checkstate and track number of games played

        $response = CodyFight::Fake();
        $response->SetCodyfighter($this->codyFighter);

        $going = $response->gameState->IsGameOnGoing();

        dd($going);
    }
}
