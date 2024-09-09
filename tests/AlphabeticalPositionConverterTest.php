<?php

use PHPUnit\Framework\TestCase;
use App\Converters\AlphabeticalPositionConverter;

class AlphabeticalPositionConverterTest extends TestCase
{
    public function testShouldCorrectlyConvertString() : void
    {
        $converter = new AlphabeticalPositionConverter;
        $convertedString = $converter->convert("22aAcd");
        
        $this->assertSame("22/1/1/3/4", $convertedString);
    }

    public function testThrowsExceptionOnAnEmptyString(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $converter = new AlphabeticalPositionConverter;  
        $converter->convert("");
    }
}