<?php

namespace App\Domain\ValueObject;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class Wheel
{
    public function __construct(private int $quantity)
    {
    }

    public static function create(int $quantity)
    {
        self::assertIsBiggerThan0($quantity);

        return new static($quantity);
    }

    private static function assertIsBiggerThan0(int $quantity)
    {
        if ($quantity <= 0) {
            throw new BadRequestException('Wheel value can not be smaller or equal to 0.');
        }
    }

    public function value(): int
    {
        return $this->quantity;
    }
}
