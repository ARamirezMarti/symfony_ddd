<?php

namespace App\Application\EventAsyncBus;

use App\Domain\Event\EventInterface;

interface EventAsyncBusInterface
{
    public function publish(EventInterface $event): void;
    public function ConsumeQueue(string $queue,callable $callback): void;    
}
