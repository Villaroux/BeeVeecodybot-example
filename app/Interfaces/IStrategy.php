<?php

namespace App\Interfaces;

use App\Responses\CodyFightResponse;

interface IStrategy
{
    public function viable();
    public function execute();
}
