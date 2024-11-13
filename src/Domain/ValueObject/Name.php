<?php

namespace App\Domain\ValueObject;

class Name
{
    public function __construct(private string $name)
    {
        // TODO add validations
    }

    public static function fromString(string $name): self
    {
        return new static($name);
    }

  
    public function value(): string
    {
        return $this->name;
    }
    
    public function __toString(): string
    {
        return $this->name;
    }
}
