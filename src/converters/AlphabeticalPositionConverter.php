<?php

namespace Converters;
use Converters\Converter;

class AlphabeticalPositionsConverter implements Converter
{
    const ALPHABET = "abcdefghijklmnopqrstuvwxyz";

    public function convert(string $string) : string
    {
        if (strlen($string) == 0) {
            throw new \InvalidArgumentException("string length cannot be 0");
        }

        $result = "";

        for ($i = 0; $i < strlen($string); $i++) {
            if (!ctype_alpha($string[$i])) {
                $result .= $string[$i];
            } else {
                $index = strpos(self::ALPHABET, strtolower($string[$i]), 0) + 1;
                $result .= "/" . $index;
            }
        }

        return $result;
    }
}
