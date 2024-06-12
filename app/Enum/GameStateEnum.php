<?php

namespace App\Enum;

enum GameStateEnum: string
{
    case INPROGRESS = 'game-in-progress';
    case NOTSTARTED = 'game-not-initialized';
}
