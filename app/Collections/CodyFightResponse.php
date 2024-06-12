<?php

namespace App\Collections;

use App\Enum\GameStateEnum;
use Illuminate\Database\Eloquent\Collection;

class CodyFightResponse extends Collection
{
    public function Update()
    {

    }
    public function IsMyTurn(): bool
    {
        return $this['gameState']->robots->bearer->is_player_turn;
    }

    public function CanPerformActions()
    {
        //Get the lowest action cost possible
    }

    public function IsGameOnGoing()
    {
        return match($this['gameState']->verdict->context)
        {
            GameStateEnum::INPROGRESS->value => true,
            default => false,
        };
    }
}
