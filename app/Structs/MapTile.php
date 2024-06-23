<?php

namespace  App\Structs;

use App\Enum\MapTileEnum;
use Illuminate\Support\Arr;

class MapTile
{
    //TODO:: Revisit all walkable types
    protected $walkableTileTypes = [
        MapTileEnum::EXIT,
        MapTileEnum::BLANK,
        MapTileEnum::DEATH_PIT,
        MapTileEnum::ENERGY_REGEN,
        MapTileEnum::ARMOR_REGEN,
        MapTileEnum::HP_REGEN,
        MapTileEnum::TELEPORTER,
        MapTileEnum::UP_SLIDER,
        MapTileEnum::DOWN_SLIDER,
        MapTileEnum::LEFT_SLIDER,
        MapTileEnum::RIGHT_SLIDER,
    ];

    public function __construct(public Vector2 $position, public MapTileEnum $type) {
        //Change Constructor to be mapped from maptiles collection
    }

    public function IsWalkable()
    {
        return Arr::exists($this->walkableTileTypes, $this->type);
    }
}
