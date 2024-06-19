<?php

namespace App\Strategies\Actions;

use App\Responses\CodyFightResponse;
use App\Strategies\ActionStrategy;

class ExitStrategy extends ActionStrategy
{
    public function execute()
    {
        //Where is our player?
        $player = $this->response->players->player;
        //Where is our exit? 
        $exit = $this->response->map->GetExitPosition();
        //Where Can I Walk?
        $tilesAroundPlayer = $this->response->map->mapTiles->getTilesAroundPosition($player->GetPosition());
        //What Tiles are available to walk near Exit?
        $tilesAroundExit = $this->response->map->mapTiles->getTilesAroundPosition($exit->position);
        //What is the shortest route?
        
        //Move towards new tile

    }

    public function evaluate(CodyFightResponse $response)
    {
        return;
    }
}