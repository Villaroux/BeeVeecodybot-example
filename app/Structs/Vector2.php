<?php

namespace App\Structs;

class Vector2
{
    public function __construct(public int $x, public int $y){
        
    }

    public function HasNegativeValues()
    {
        return $this->x < 0 || $this->y < 0;
    }

    public function IsDiagonal(Vector2 $position): bool
    {
        /**
         *  1,3  |  2,3   |  3,3
         * ______|________|________
         *       |        |
         *  1,2  |  2,2   |  3,2
         * ______|________|________
         *  1,1  |  2,1   |  3,1
         * 
         */

        /**
          * In the example we can verify that if the given position is in
          * the diagonal then both x and y values must be diferent that comparee position
          */

        /**
         *  x    |  o     |  x
         * ______|________|________
         *       |        |
         *  o    |  o     |  o
         * ______|________|________
         *  x    |  o     |  x
         * 
         */
        return ($this->x != $position->x && $this->y != $position->y);
    }
}