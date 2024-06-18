<?php

namespace App\Collections;

use App\Enum\MapTileEnum;
use Illuminate\Support\Collection;

class MapTiles extends Collection
{
    public function getTiles(MapTileEnum $tileEnum): Collection
    {
        
        return $this->where('name', $tileEnum->value);
    }
}