<?php

use PHPUnit\Framework\TestCase;
use Converters\Rot13Converter;

class Rot13ConverterTest extends TestCase
{
    public function testShouldCorrectlyConvertString() : void
    {
        $stringToConvert = "The Quick Brown Fox Jumps Over The Lazy Dog";
        $converter = new Rot13Converter;
        $convertedString = $converter->convert($stringToConvert);

        $this->assertSame(str_rot13($stringToConvert), $convertedString);

    }
    
    public function testThrowsExceptionOnAnEmptyString(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $converter = new Rot13Converter;  
        $converter->convert("");
    
    }
}