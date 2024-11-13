<?php

namespace App\Domain\ValueObject;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Wheel
{
    public function __construct(private int $quantity)
    {
    }

    public static function create(int $quantity): static    
    {
        self::assertIsBiggerThan0($quantity);

        return new static($quantity);
    }

    private static function assertIsBiggerThan0(int $quantity): void
    {
        if ($quantity <= 0) {
            throw new BadRequestException('Wheel value can not be smaller or equal to 0.');
        }
    }

    public function value(): int
    {
        return (int) $this->quantity;
    }

    public function __toString(): string
    {
        return (string) $this->quantity;
    }
}
