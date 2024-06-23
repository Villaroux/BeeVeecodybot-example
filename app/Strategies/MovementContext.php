<?php

namespace App\Strategies;

use App\Abstracts\Context;
use App\Responses\CodyFightResponse;
use App\Strategies\Actions\ExitStrategy;

class MovementContext extends Context
{
    public function evaluate(CodyFightResponse $response): bool
    {
        //Has an Exit been spawned?
        /**
         * // If Exit has spawned then priorityze movement towards exit
         * if ($response->ExitSpawned()) {
         *
         * }
         *
         * // If opponent has more health than us then prioritize spacing opponent~
         * if ($response->HealthComparison()) {
         *
         * }
         *
         * $this->strategy = new SkipStrategy();
         */
        //$response->map->mapTiles->getTiles();
        dd($response->map->HasExitSpawned());
        if ($response->map->HasExitSpawned()) {
            //Move towards Exit
            $this->strategy = new ExitStrategy($response);
            return true;
        }
        return false;
    }
}
