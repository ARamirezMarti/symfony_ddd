<?php

namespace App\Domain\Event;

use App\Domain\Event\Car\CarCreatedEvent;
use App\Domain\EventListeners\SendEmail;


class SyncEventMappings {

    public static function mapping(): array{
        return [
            CarCreatedEvent::class => [
                SendEmail::class
            ]
        ];
    }
}
