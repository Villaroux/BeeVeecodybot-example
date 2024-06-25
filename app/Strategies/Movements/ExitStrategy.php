<?php

namespace App\Strategies\Movements;

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

    public function viable(): bool
    {
        //Where is our player?
        $player = $this->response->players->player;

        $this->source = $player->GetPosition();
        //Where is our exit? When We are inside this strategy we assume that there is a way to get to the exit
        $exit = $this->response->getMap()->GetExitTile();
        //Where Can I Walk?
        $tilesAroundPlayer = $this->response->getMap()->getTilesAroundPosition($player->GetPosition());

        foreach ($tilesAroundPlayer as $mapTile) {
           /*  dd(
                $player->IsPositionWalkable($mapTile),
                $this->source,
                $mapTile->position,
                $exit->position,
                $exit->Distance($mapTile),
                $mapTile->IsWalkable()
            ); */


        }
        //What is the shortest route?

        //Move towards new tile
        return false;
    }
}
