<?php

namespace App\Domain\QueryBus;

interface QueryBusInterface
{
    public function handle($query): mixed;

}
