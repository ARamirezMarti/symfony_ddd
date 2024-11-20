<?php

namespace App\Application\EventSyncBus;

use App\Domain\Event\EventInterface;

interface EventSyncBusInterface
{
    public function publish(EventInterface $event): void;
}
