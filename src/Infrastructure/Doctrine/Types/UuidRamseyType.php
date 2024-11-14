<?php

namespace App\Infrastructure\Doctrine\Types;


use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Ramsey\Uuid\Uuid;

class UuidRamseyType extends Type
{
    const UUID = 'uuid'; 

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return "CHAR(36)";
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        return Uuid::fromString($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {

        if ($value === null) {
            return null;
        }

        return $value->toString();
    }
   
    public function getName()
    {
        return self::UUID;
    }
}
