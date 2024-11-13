<?php

namespace App\Infrastructure\Doctrine\Types;

use App\Domain\ValueObject\Wheel;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class WheelType extends Type
{
    const NAME = 'Wheel';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getIntegerTypeDeclarationSQL([]);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Wheel
    {
        return $value !== null ? Wheel::create( quantity: $value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {        
        return (int) $value->value() ;
    }


    public function getName(): string
    {
        return self::NAME;
    }

    
}
