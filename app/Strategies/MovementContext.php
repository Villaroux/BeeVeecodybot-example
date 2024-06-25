<?php

namespace App\Strategies;

use App\Abstracts\Context;
use App\Responses\CodyFightResponse;
use App\Strategies\Movements\ExitStrategy;
use App\Strategies\Movements\Random;
use App\Structs\Vector2;

class MovementContext extends Context
{
    public function evaluate(CodyFightResponse $response): bool
    {
        $defaultStrategy = new Random($response);
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
        if ($response->GetMap()->HasExitSpawned()) {
            //Move towards Exit
            $possibleStrategy = new ExitStrategy($response);
            $this->strategy = ($possibleStrategy->viable()) ? $possibleStrategy : $defaultStrategy;
            return true;
        }
        return false;
    }
}
