<?php

namespace Converters;


class StringConverter {
    private static string $alphabet = "abcdefghijklmnopqrstuvwxyz";
    private static string $capitalizedAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public static function convertAlphabeticalPositions(string $string) : string
    {
        $result = "";

        for ($i = 0; $i < strlen($string); $i++) {
            if (!ctype_alpha($string[$i])) {
                $result .= $string[$i];
            } else {
                $index = strpos(self::$alphabet, strtolower($string[$i]), 0) + 1;
                $result .= "/" . $index;
            }
        }

        return $result;
    }

    public static function convertRot13(string $string) : string
    {
        $result = "";

        for ($i = 0; $i < strlen($string); $i++) {
            if(!ctype_alpha($string[$i])) {
                $result .= $string[$i];
            } else {
                $alphabet = ctype_upper($string[$i]) ? self::$capitalizedAlphabet : self::$alphabet;
                $index = strpos($alphabet, $string[$i], 0);
                $rot13Index = ($index + 13) % 26;

                $result .= $alphabet[$rot13Index];
            }
        }

        return $result;
    }
}