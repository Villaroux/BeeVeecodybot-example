<?php

namespace App\CodyFight;

use App\Collections\MapTiles;
use App\Enum\MapTileEnum;
use App\Structs\MapTile;
use App\Structs\Vector2;

class Map
{
    public MapTiles $mapTiles;

    public function __construct(array $mapArray)
    {
        $this->mapTiles = new MapTiles($mapArray);
    }

    public function HasExitSpawned(): bool
    {
        return $this->mapTiles->getTiles(MapTileEnum::EXIT)->count() > 0;
    }

    public function GetExitPosition(): MapTile
    {
        return $this->mapTiles->getTile(MapTileEnum::EXIT);
    }
}