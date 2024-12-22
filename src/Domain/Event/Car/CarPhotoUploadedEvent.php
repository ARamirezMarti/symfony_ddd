<?php

namespace App\Domain\Event\Car;

use App\Domain\Event\DomainEvent;

class CarPhotoUploadedEvent extends DomainEvent
{
    protected string $eventName = 'CarPhotoUploaded';
    protected ?string $exchange  = "car";
    protected string $queue = 'photo_uploaded';
}
