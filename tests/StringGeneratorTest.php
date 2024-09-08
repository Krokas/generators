<?php

use PHPUnit\Framework\TestCase;
use Generators\StringGenerator;

class StringGeneratorTest extends TestCase
{

    public function testGenerateCanGenerateCorrectLength(): void
    {
        $length = rand(1, 10);

        $stringGenerator = new StringGenerator($length);  
        $randomString = $stringGenerator->get();

        $this->assertSame($length, strlen($randomString));
    }

    public function testGenerateThrowsInvalidArgumentExceptionWhenLengthEqualsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new StringGenerator(0);
    }
}