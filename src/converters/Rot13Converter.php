<?php

namespace Converters;
use Converters\Converter;

class Rot13Converter implements Converter
{
    const ALPHABET = "abcdefghijklmnopqrstuvwxyz";
    const CAPITALIZED_ALPHABET = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function convert(string $string) : string
    {
        if (strlen($string) == 0) {
            throw new \InvalidArgumentException("string length cannot be 0");
        }

        $result = "";

        for ($i = 0; $i < strlen($string); $i++) {
            if(!ctype_alpha($string[$i])) {
                $result .= $string[$i];
            } else {
                $alphabet = ctype_upper($string[$i]) ? self::CAPITALIZED_ALPHABET : self::ALPHABET;
                $index = strpos($alphabet, $string[$i], 0);
                $alphabetLength = strlen($alphabet);
                $rot13Index = ($index + $alphabetLength / 2) % $alphabetLength;

                $result .= $alphabet[$rot13Index];
            }
        }

        return $result;
    }
}
