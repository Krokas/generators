<?php

namespace Generators;
use Generators\Generator;
use Converters\Converter;

class StringGenerator implements Generator
{
    const CHARACTERS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    private string $string;

    public function __construct(int $length)
    {
        $result = "";

        if ($length == 0) {
            throw new \InvalidArgumentException("Length cannot be 0");
        }

        for ($i = 0; $i < $length; $i++)
        {
            $randomCharacter = substr(self::CHARACTERS, rand(0, strlen(self::CHARACTERS) - 1), 1);
            $result .= $randomCharacter;
        }

        $this->string = $result;
    }

    public function get() : string
    {
        return $this->string;
    }

    public function applyConverter(Converter $converter) : void
    {
        $this->string = $converter->convert($this->string);
    }
}