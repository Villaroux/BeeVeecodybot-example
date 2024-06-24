<?php

namespace App\Enum;

use Illuminate\Support\Arr;

enum MapTileEnum: string
{
    case BLANK = 'Blank';
    case OBSTACLE = 'Obstacle';
    case WALL = 'Wall mark 0';
    case LESSER_OBSTACLE = 'Lesser Obstacle';
    case EXIT = 'Exit Gate';

    case BOOBY_TRAP = 'Booby Trap';
    case ZAP_TRAP = 'Zap Trap';
    case ICE_TRAP = 'Ice Trap';
    case DEATH_PIT = 'Death Pit';
    case BOMB = 'Bomb';
    case PROX_MINE = 'Proximity Mine';
    case CRAZE = 'Craze';

    case ENERGY_REGEN = 'Energy Regenerator';
    case ARMOR_REGEN = 'Armor Regenerator';
    case HP_REGEN = 'HP Regenerator';
    case TELEPORTER = 'Bidirectional teleport';

    case UP_SLIDER = 'Upwards Directional Slider';
    case DOWN_SLIDER = 'Downwards Directional Slider';
    case LEFT_SLIDER = 'Left Side Directional Slider';
    case RIGHT_SLIDER = 'Right Side Directional Slider';

    public function IsWalkable(/* MapTileEnum $mapTileEnum */)
    {
        return in_array(
            $this,
            config('codyfighters.map.tiles.walkable')
        );
    }
}
