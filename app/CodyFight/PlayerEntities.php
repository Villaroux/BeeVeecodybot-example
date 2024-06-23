<?php

namespace App\CodyFight;

class PlayerEntities
{
    public Player $player;
    public Player $opponent;

    public function __construct(array $players) {
        $player = new Player($players['bearer']);
        $player = new Player($players['opponent']);
    }
}
