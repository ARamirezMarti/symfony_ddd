<?php

namespace App\Infrastructure\Doctrine\Types;

use App\Domain\ValueObject\Name;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class NameType extends Type
{
    const NAME = 'name';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL(['length' => 255]);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Name
    {
        return $value !== null ? Name::fromString($value) : null;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {        
        return $value instanceof Name ? (string) $value->value() : null;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
