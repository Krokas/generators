<?php

use PHPUnit\Framework\TestCase;


class StringConverterTest extends TestCase
{
    public function testConvertAlphabeticalPositionsShouldConvertStringCorrectly() : void
    {
        $convertedString = Converters\StringConverter::convertAlphabeticalPositions("22aAcd");

        $this->assertSame("22/1/1/3/4", $convertedString);
    }
}