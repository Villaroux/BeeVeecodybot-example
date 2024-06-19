<?php

namespace  App\Structs;

use App\Enum\MapTileEnum;
use Illuminate\Support\Arr;

class MapTile
{   
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
    }

    public function IsWalkable()
    {
        return Arr::exists($this->walkableTileTypes, $this->type);
    }
}