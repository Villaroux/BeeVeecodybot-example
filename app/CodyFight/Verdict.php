<?php

namespace App\CodyFight;

class Verdict
{
    public int $context;
    public string $winner;
    public string $statement;

    public function __construct(array $gameState)
    {
        $this->context = $gameState['context'];
        $this->winner = $gameState['winner'];
        $this->statement = $gameState['statement'];
    }

    public function IsGameOnGoing()
    {
        
    }

    public function dd()
    {
        dump($this);
        die;
    }
}