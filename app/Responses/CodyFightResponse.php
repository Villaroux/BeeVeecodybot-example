<?php

namespace App\Responses;

use App\Enum\GameStateEnum;
use App\Enum\MapTileEnum;
use App\Structs\Vector2;
use Illuminate\Http\Client\Response;

class CodyFightResponse extends Response
{
    public static function make(string $json): self
    {
        $codyResponse = new CodyFightResponse($json);
        
        return $codyResponse;
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

    public function GetPosition(Vector2 $mapTilePosition)
    {
        
    }

    public function GetMyPosition(): Vector2 
    {
        return new Vector2($this['x'], $this['y']);
    }
}