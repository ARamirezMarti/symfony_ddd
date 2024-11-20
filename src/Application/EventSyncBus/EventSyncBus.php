<?php

namespace App\Application\EventSyncBus;

use App\Domain\Event\EventInterface;
use App\Domain\Event\SyncEventMappings;

class EventSyncBus implements EventSyncBusInterface
{
    private array $syncEventsMapping;
    public function __construct(){
        $this->syncEventsMapping = SyncEventMappings::mapping();
    }    

    public function publish(EventInterface $event): void
    {
        $eventName = get_class($event);

        if (!isset($this->syncEventsMapping[$eventName])) {
            return;
        }

        foreach ($this->syncEventsMapping[$eventName] as $subscriberClass) {
            $subscriber = new $subscriberClass();
            $subscriber($event); 
        }
    }
}