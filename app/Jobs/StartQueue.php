<?php

namespace App\Jobs;

use App\Traits\Jobs\HasCodyFighter;
use App\CodyFight\Entities\CodyFighter;
use App\Services\CodyFight;
use App\Strategies\Context;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StartQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public CodyFighter $codyFighter, protected int $gamesToPlay = 1)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //TODO:: Finish job rotation to checkstate and track number of games played

        $response = CodyFight::Fake();
        $response->SetCodyfighter($this->codyFighter);

        Context::TakeAction($response); //Temporary
        //Dispatch CheckState Job
        CheckState::dispatch($this->codyFighter)->onQueue('codyfighters');
    }
}
