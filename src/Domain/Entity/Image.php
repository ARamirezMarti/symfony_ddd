<?php

namespace App\Domain\Entity;

class Image
{
    private function __construct(
        public string $originalName,
        public string $mime,
        public string $tmpFilePath,
        public string $tmpFileName ,
        public string $base64Content
    ){
    }

    public static function create(
        string $originalName,
        string $mime,
        string $tmpFilePath,
        string $tmpFileName,
        string $base64Content ): self
    {
        return new static($originalName,$mime,$tmpFilePath,$tmpFileName, $base64Content);
    }
    
    public function originalName(): string
    {
        return $this->originalName;
    }
}
