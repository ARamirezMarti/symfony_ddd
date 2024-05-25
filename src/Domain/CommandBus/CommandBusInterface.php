<?php

namespace App\Domain\CommandBus;

interface CommandBusInterface
{
    public function handle($command): void;
}
