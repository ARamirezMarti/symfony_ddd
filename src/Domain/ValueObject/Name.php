<?php

namespace App\Domain\ValueObject;

class Name
{
    public function __construct(private string $name)
    {
        // TODO add validations
    }

    public static function fromString(string $name)
    {
        return new static($name);
    }

  
    public function getName()
    {
        return $this->name;
    }
}
