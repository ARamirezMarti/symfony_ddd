<?php

namespace App\Infrastructure\Messenger;

use App\Domain\CommandBus\CommandBusInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus implements CommandBusInterface
{
    private MessageBusInterface $commandBus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function handle($command): void
    {
        $this->commandBus->dispatch($command);
    }
}
