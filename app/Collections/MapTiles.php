<?php

namespace App\Collections;

use App\Enum\MapTileEnum;
use App\Structs\MapTile;
use App\Structs\Vector2;
use Illuminate\Support\Collection;

class MapTiles extends Collection
{
    //TODO:: Think of MapTiles as custom collection functionality to retrieve data

    public function getTiles(MapTileEnum $tileEnum): Collection
    {
        return $this->where('type', $tileEnum);
    }

    public function getTile(MapTileEnum $tileEnum): MapTile
    {
        $mapTile = $this->getTiles($tileEnum)->first();

        return $mapTile;
    }

    public function getTilesAroundPosition(Vector2 $position): self
    {
        //TODO:: Map collection into a collection with MapTile objects
        return $this
            ->whereBetween('position.x',[$position->x-1,$position->x+1])
            ->whereBetween('position.y',[$position->y-1, $position->y+1]);
    }

    public function getTileFromPosition(Vector2 $position)
    {
        $maptile = $this
            ->where('position.x', $position->x)
            ->where('position.y', $position->y)
            ->first();

        return $maptile;
    }
}
