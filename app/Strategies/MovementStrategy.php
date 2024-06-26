<?php

namespace App\Strategies;

use App\Responses\CodyFightResponse;
use App\Interfaces\IStrategy;

abstract class MovementStrategy implements IStrategy
{
    public abstract function evaluate(CodyFightResponse $response);

    public abstract function execute();
}
