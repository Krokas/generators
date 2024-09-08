<?php

namespace Converters;


class StringConverter {
    public static function convertAlphabeticalPositions(string $string) : string
    {
        $result = "";

        $alphabet = "abcdefghijklmnopqrstuvwxyz";

        for ($i = 0; $i < strlen($string); $i++) {
            if (is_numeric($string[$i])) {
                $result .= $string[$i];
            } else {
                $index = strpos($alphabet, strtolower($string[$i]), 0) + 1;
                $prefix = $i > 0 ? "/" : "";
                $result .= $prefix . $index;
            }
        }

        return $result;
    }
}