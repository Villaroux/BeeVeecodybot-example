<?php

namespace  App\Structs;

use App\Enum\MapTileEnum;
use Exception;
use Illuminate\Support\Arr;

class MapTile
{

    public Vector2 $position;
    public MapTileEnum $type;


    public function __construct(array $data) {
        $this->position = new Vector2(
            $data['position']['x'],
            $data['position']['y']
        );

        $this->type = MapTileEnum::tryFrom($data['name']);
        //Change Constructor to be mapped from maptiles collection
    }

    public function IsWalkable()
    {
        return $this->type->IsWalkable();
    }

    public function Distance(MapTile $maptile)
    {
        return abs(
            (
                ($this->position->x - $maptile->position->x)
                + ($this->position->y - $maptile->position->y)
            )
        );
    }
}
