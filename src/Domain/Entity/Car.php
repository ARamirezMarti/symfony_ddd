<?php

namespace App\Domain\Entity;

class Car
{
    public function __construct(
        private string $uuid,
        private string $name,
        private int $wheelCount,
    ) {
    }

    public function getId(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWheelCount(): int
    {
        return $this->wheelCount;
    }

    public function setWheelCount(int $wheelCount): self
    {
        $this->wheelCount = $wheelCount;

        return $this;
    }
}
