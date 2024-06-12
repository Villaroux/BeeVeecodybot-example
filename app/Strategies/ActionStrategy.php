<?php

namespace App\Strategies;

use App\Collections\CodyFightResponse;
use App\Interfaces\IStrategy;

abstract class ActionStrategy implements IStrategy
{
    public abstract function evaluate(CodyFightResponse $response);

    public abstract function execute();
}
