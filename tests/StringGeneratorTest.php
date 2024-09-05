<?php

use PHPUnit\Framework\TestCase;

class StringGeneratorTest extends TestCase
{
    public function testCanGenerateCorrectLength(): void
    {
        $length = rand(1, 10);

        $randomString = Generators\StringGenerator::generate($length);

        $this->assertSame($length, strlen($randomString));
    }

    public function testThrowsInvalidArgumentExceptionWhenLengthEqualsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $length = 0;
        Generators\StringGenerator::generate($length);

    }
}