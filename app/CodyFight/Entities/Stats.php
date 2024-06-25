<?php

namespace App\CodyFight\Entities;

class Stats
{
    public function __construct(
        public int $health,
        public int $maxHealth,
        public int $armor,
        public int $maxArmor,
        public int $energy,
        public int $maxEnergy,
        public int $durability,
        public int $maxDurability,
        public int $movement
    ) {
    }

    public static function make()
    {
        //TODO:::Think if there is really need for having a static creation method
        return new static(0,0,0,0,0,0,0,0,0,0);
    }

    public static function makeFromData(array $data): self
    {
        $stats = self::make();
        $stats->health = $data['hitpoints'];
        $stats->maxHealth = $data['hitpoints_cap'];
        $stats->armor = $data['armor'];
        $stats->maxArmor = $data['armor_cap'];
        $stats->energy = $data['energy'];
        $stats->maxEnergy = $data['energy_cap'];
        $stats->durability = $data['durability'];
        $stats->maxDurability = $data['durability_cap'];
        $stats->movement= $data['movement_range'];

        return $stats;
    }

    public function IsAlive()
    {
        return $this->health > 0;
    }
}
