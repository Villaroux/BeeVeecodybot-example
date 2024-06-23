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
        $mapTiles = new MapTiles($mapArray);

        $this->mapTiles = $mapTiles->mapInto(MapTile::class);
    }

    public function HasExitSpawned(): bool
    {
        dd($this->mapTiles->getTiles(MapTileEnum::EXIT));
        return $this->mapTiles->getTiles(MapTileEnum::EXIT)->count() > 0;
    }

    public function GetExitPosition(): MapTile
    {
        return $this->mapTiles->getTile(MapTileEnum::EXIT);
    }

    //TODO::Think of using Map as a repository to query the collection
}
