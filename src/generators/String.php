<?php

namespace Generators;

class StringGenerator {
    private static string $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    static public function generate(int $length) : string {
        $result = "";

        if ($length == 0) {
            throw new \InvalidArgumentException("Length cannot be 0");
        }

        for ($i = 0; $i < $length; $i++)
        {
            $randomCharacter = substr(self::$chars, rand(0, strlen(self::$chars) - 1), 1);
            $result .= $randomCharacter;
        }

        return $result;
    }
}