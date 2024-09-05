<?php

use PHPUnit\Framework\TestCase;

class StringGeneratorTest extends TestCase
{
    public function testGenerateCanGenerateCorrectLength(): void
    {
        $length = rand(1, 10);

        $randomString = Generators\StringGenerator::generate($length);

        $this->assertSame($length, strlen($randomString));
    }

    public function testGenerateThrowsInvalidArgumentExceptionWhenLengthEqualsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $length = 0;
        Generators\StringGenerator::generate($length);

    }

    public function testGenerateArrayGeneratesArrayOfCorrectSize(): void
    {
        $stringLength = rand(1, 10);

        $arrayLength = rand(1, 10);

        $randomStringArray = Generators\StringGenerator::generateArray($arrayLength, $stringLength);

        $this->assertSame($arrayLength, count($randomStringArray));
    }
}