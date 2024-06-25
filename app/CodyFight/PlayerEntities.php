<?php

namespace App\CodyFight;

class PlayerEntities
{
    public Player $player;
    public Player $opponent;

    public function __construct(array $players) {
        $this->player = new Player($players['bearer']);
        $this->opponent = new Player($players['opponent']);

    }
}
