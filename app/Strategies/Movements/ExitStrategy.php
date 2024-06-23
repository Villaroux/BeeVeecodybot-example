<?php

namespace App\Strategies\Actions;

use App\Responses\CodyFightResponse;
use App\Strategies\ActionStrategy;
use App\Structs\MapTile;
use App\Structs\Vector2;

class ExitStrategy extends ActionStrategy
{
    protected Vector2 $source;
    protected MapTile $currentNode;
    protected array $visitedNodes;

    public function execute()
    {

    }

    public function evaluate(CodyFightResponse $response): bool
    {

        //Where is our player?
        $player = $this->response->players->player;

        $this->source = $player->GetPosition();
        //Where is our exit? When We are inside this strategy we assume that there is a way to get to the exit
        $exit = $this->response->map->GetExitPosition();
        //Where Can I Walk?
        $tilesAroundPlayer = $this->response->map->mapTiles->getTilesAroundPosition($player->GetPosition());
        //What Tiles are available to walk near Exit?
        $tilesAroundExit = $this->response->map->mapTiles->getTilesAroundPosition($exit->position);
        //What is the shortest route?

        //Move towards new tile
        return false;
    }
}
