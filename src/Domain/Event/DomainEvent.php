<?php

namespace App\Domain\Event;

abstract class DomainEvent implements EventInterface
{
    protected string $eventName;
    protected ?string $exchange;
    protected string $queue;
    protected mixed $body;

    
    public static function create(mixed $data): self 
    { 
        return new static($data);
    }
    private function __construct(mixed $data)
    {        
        $this->body = $data;
    }

    public function exchange(): ?string
    {
        return $this->exchange;
    }
    
    public function queue(): string
    {
        return $this->queue;
    }
    
    public function body(): mixed
    {
        return $this->body;
    }

    public function toMessage(): string
    {
        return serialize($this);
    }

}
