<?php

namespace App\Responses;

use App\CodyFight\GameState;
use App\CodyFight\Map;
use App\Codyfight\PlayerEntities;
use App\CodyFight\Verdict;
use App\Enum\GameStateEnum;
use App\Enum\MapTileEnum;
use App\Structs\Vector2;
use App\Traits\Jobs\HasCodyFighter;
use Illuminate\Http\Client\Response;

class CodyFightResponse extends Response
{
    use HasCodyFighter;

    public GameState $gameState;
    public Map $map;
    public Verdict $verdict;
    public PlayerEntities $players;

    public static function make(array $decodedJSON): self
    {
        $codyResponse = new CodyFightResponse($decodedJSON);
        
        $codyResponse->gameState = new GameState($decodedJSON['gameState']['state']);

        $codyResponse->verdict = new Verdict($decodedJSON['gameState']['verdict']);

        $codyResponse->players = new PlayerEntities($decodedJSON['gameState']['players'] ?? $decodedJSON['gameState']['robots']);

        $codyResponse->map = new Map($decodedJSON['gameState']['map']);
        
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