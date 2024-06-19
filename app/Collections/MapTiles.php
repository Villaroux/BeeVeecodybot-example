<?php

namespace App\Collections;

use App\Enum\MapTileEnum;
use App\Structs\MapTile;
use App\Structs\Vector2;
use Illuminate\Support\Collection;

class MapTiles extends Collection
{
    public function getTiles(MapTileEnum $tileEnum): Collection
    { 
        return $this->where('name', $tileEnum->value);
    }

    public function getTile(MapTileEnum $tileEnum): MapTile
    {
        $mapTile = $this->getTiles($tileEnum)->first();

        $position = new Vector2($mapTile->position->x, $mapTile->position->y);

        return new MapTile($position, $tileEnum);
    }

    public function getTilesAroundPosition(Vector2 $position): self
    {
        //TODO:: Map collection into a collection with MapTile objects
        $this
            ->whereBetween('position.x',[$position->x-1,$position->x+1])
            ->whereBetween('position.y',[$position->y-1, $position->y+1]);

        return $this;
    }

    public function getTileFromPosition(Vector2 $position)
    {
        $maptile = $this
            ->where('position.x', $position->x)
            ->where('position.y', $position->y)
            ->first();
        
        return new MapTile($position, MapTileEnum::tryFrom($maptile->type));
    }
}