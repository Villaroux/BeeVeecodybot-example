<?php

namespace App\Enum;

enum MapTileEnum: string
{
    case BLANK = 'Blank';
    case OBSTACLE = 'Obstacle';
    case WALL = 'Wall mark 0';
    case LESSET_OBSTACLE = 'Lesser Obstacle';
    case EXIT = 'Exit Gate';
    
    case BOOBY_TRAP = 'Booby Trap';
    case ZAP_TRAP = 'Zap Trap';
    case DEATH_PIT = 'Death Pit';
    case BOMB = 'Bomb';
    case PROX_MINE = 'Proximity Mine';
    
    case ENERGY_REGEN = 'Energy Regenerator';
    case ARMOR_REGEN = 'Armor Regenerator';
    case HP_REGEN = 'Hitpoints Regenerator';
    case TELEPORTER = 'Bidirectional teleport';
    
    case UP_SLIDER = 'Upwards Directional Slider';
    case DOWN_SLIDER = 'Downwards Directional Slider';
    case LEFT_SLIDER = 'Left Side Directional Slider';
    case RIGHT_SLIDER = 'Right Side Directional Slider';

}