<?php

namespace App\Infrastructure\Messenger;

use App\Domain\QueryBus\QueryBusInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class QueryBus implements QueryBusInterface
{
    public function __construct(private MessageBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }
    public function handle($query): mixed {

        $envelope = $this->queryBus->dispatch($query);
        $handledStamp = $envelope->last(HandledStamp::class);
        return $handledStamp ? $handledStamp->getResult() : null;
    }

}
