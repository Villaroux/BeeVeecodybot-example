<?php

namespace App\Strategies\Actions;

use App\Responses\CodyFightResponse;
use App\Services\CodyFight;
use App\Strategies\ActionStrategy;
use App\Structs\MapTile;
use App\Structs\Vector2;

class Random extends ActionStrategy
{

    public function execute()
    {
        $player = $this->response->players->player;
        //Where can I walk?
        $tilesAroundPlayer = $this->response->map->mapTiles->getTilesAroundPosition($player->GetPosition());

        $validTiles = [];

        foreach ($tilesAroundPlayer as $tile) {
            //Check if this tile is either up|down|left|right of player since these are the only
            //possible movement options
            //Get possible tile
            $mapTile = $this->response->map->mapTiles->getTileFromPosition(
                new Vector2(
                    $tile['position']['x'],
                    $tile['position']['y']
                )
            );

            if (!$mapTile->IsWalkable()) {
                continue;
            }

            if (! $player->IsPositionWalkable($mapTile)) {
                continue;
            }

        $validTiles[] = $mapTile;
            //Valid Tile
        }

        if (count($validTiles) == 0) {
            //Skip there are no tiles available
        }

        //Move towards a space

        //CodyFight::MoveCodyFighter()
    }

    public function evaluate(CodyFightResponse $response)
    {
        return;
    }
}