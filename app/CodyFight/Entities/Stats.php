<?php

namespace App\CodyFight\Entities;

class Stats
{
    public function __construct(public int $health, public int $armor, public int $energy, public int $durability, public int $movement,) {
    }

    public static function make()
    {
        //TODO:::Think if there is really need for having a static creation method
        return new static(0,0,0,0,0,0);
    }
}
