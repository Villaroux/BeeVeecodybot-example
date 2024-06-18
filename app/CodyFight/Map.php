<?php

namespace App\CodyFight;

use App\Collections\MapTiles;

class Map
{
    public MapTiles $mapTiles;

    public function __construct(array $mapArray)
    {
        $this->mapTiles = new MapTiles($mapArray);
    }
}