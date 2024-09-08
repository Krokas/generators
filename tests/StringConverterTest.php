<?php

use PHPUnit\Framework\TestCase;


class StringConverterTest extends TestCase
{
    public function testConverterAlphabeticalPositionsShouldConvertStringCorrectly() : void
    {
        $convertedString = Converters\StringConverter::convertAlphabeticalPositions("22aAcd");

        $this->assertSame("22/1/1/3/4", $convertedString);
    }

    public function testConverterRot13ShouldConvertStringCorrectly() : void
    {
        $stringToConvert = "The Quick Brown Fox Jumps Over The Lazy Dog";
        $convertedString = Converters\StringConverter::convertRot13($stringToConvert);

        $this->assertSame(str_rot13($stringToConvert), $convertedString);
    }
}