<?php

namespace App\CodyFight;

use App\Structs\MapTile;
use App\Structs\Vector2;

class Player
{
    protected Vector2 $position;

    public function __construct(array $data)
    {
        if (empty($data['position'])) {
            $this->position = Vector2::Zero();
            return;
        }

        $this->position = new Vector2($data['position']['x'], $data['position']['y']);
    }

    public function GetPosition(): Vector2
    {
        return $this->position;
    }

    public function IsPositionWalkable(MapTile $possibleTile): bool
    {

        //If it is the same position then its skippable
        //This action will not be allowed in this method

        //Must at least have one position equal to the one to check
        //Example P(2,2), pos(2,1) => true
        //Example P(2,2), pos(3,3) => false, because this is diagonal to the player
        return ! ($this->position->IsDiagonal($possibleTile->position));

    }
}
