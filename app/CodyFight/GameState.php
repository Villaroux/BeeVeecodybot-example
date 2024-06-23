<?php

namespace App\CodyFight;

class GameState
{
    public int $id;
    public int $status;
    public int $mode;
    public int $round;
    public int $total_turns;
    public int $total_rounds;
    public int $max_turn_time;
    public int $turn_time_left;

    public function __construct(array $gameState)
    {
        $this->id = $gameState['id'];
        $this->status = $gameState['status'];
        $this->mode = $gameState['mode'];
        $this->round = $gameState['round'];
        $this->total_turns = $gameState['total_turns'];
        $this->total_rounds = $gameState['total_rounds'];
        $this->max_turn_time = $gameState['max_turn_time'];
        $this->turn_time_left = $gameState['turn_time_left'];
    }

    public function IsGameOnGoing()
    {
        return $this->status != 2;
        //TODO:: Finish checking if game is running and return bool
    }

    public function HasGameEnded()
    {
        return $this->status != 2;
        //TODO:: Finish checking if game is running and return bool
    }
}
