<?php

namespace App\Domain\EventListeners;

use App\Domain\Event\Car\CarCreatedEvent;
use App\Domain\Event\EventInterface;

class SendEmail
{
    /**     
     * @param CarCreatedEvent $event     
     * @return void
     */
    public function __invoke(EventInterface $event) 
    {
        $car = $event->car();
        echo "Send email for car created...{$car->id()}";
    }
}
