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
        /* $mapTiles = new MapTiles($mapArray);

        $mapTiles->each(function (array $index, int $value) {
            dd($index,$value);
        }); */

        //$this->mapTiles = $mapTiles->mapInto(MapTile::class);
        $mapTileArray = [];

        foreach ($mapArray as $rowIndex => $columnIndex) {
            foreach ($columnIndex as $column => $mapTileData)
            $mapTileArray[] = new MapTile($mapTileData);
        }

        $this->mapTiles = new MapTiles($mapTileArray);
    }


    //TODO::Think of using Map as a repository to query the collection
}
