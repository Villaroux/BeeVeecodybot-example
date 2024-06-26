<?php

namespace App\Strategies;

use App\Responses\CodyFightResponse;
use App\Interfaces\IStrategy;

abstract class ActionStrategy implements IStrategy
{
    public function __construct(public CodyFightResponse $response)
    {

    }
    public abstract function viable();

    public abstract function execute();
}
