<?php

namespace App\Responses;

use App\CodyFight\GameState;
use App\CodyFight\Map;
use App\CodyFight\PlayerEntities;
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
    protected Map $map;
    public Verdict $verdict;
    public PlayerEntities $players;

    /**
     * Map into custom response
     *
     * @param array $decodedJSON
     * @return self
     */
    public static function make(array $decodedJSON): self
    {
        $codyResponse = new CodyFightResponse($decodedJSON);

        $codyResponse->gameState = new GameState($decodedJSON['gameState']['state']);

        $codyResponse->verdict = new Verdict($decodedJSON['gameState']['verdict']);

        $codyResponse->players = new PlayerEntities($decodedJSON['gameState']['players'] ?? $decodedJSON['gameState']['robots']);

        $codyResponse->map = new Map($decodedJSON['gameState']['map']);

        return $codyResponse;
    }

    //TODO:: Move to GameState
    public function IsMyTurn(): bool
    {
        return $this['gameState']->robots->bearer->is_player_turn;
    }

    //TODO:: Move to Player
    public function CanPerformActions()
    {
        //Get the lowest action cost possible
    }

    //TODO:: Move to GameState
    public function IsGameOnGoing()
    {
        return match($this['gameState']->verdict->context)
        {
            GameStateEnum::INPROGRESS->value => true,
            default => false,
        };
    }

    public function getMap()
    {
        return $this->map->mapTiles;
    }
}
