<?php

use PHPUnit\Framework\TestCase;
use Generators\StringGenerator;

class StringGeneratorTest extends TestCase
{

    public function testShouldGenerateStringOfCorrectLength(): void
    {
        $length = rand(1, 10);

        $stringGenerator = new StringGenerator($length);  
        $randomString = $stringGenerator->get();

        $this->assertSame($length, strlen($randomString));
    }

    public function testShouldThrowExceptionWhenLengthEqualsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new StringGenerator(0);
    }
}