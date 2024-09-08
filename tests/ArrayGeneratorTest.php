<?php

use PHPUnit\Framework\TestCase;
use Generators\ArrayGenerator;
use Generators\StringGenerator;

class ArrayGeneratorTest extends TestCase
{
    public function testShouldGenerateCorrectSizeArrayAndCorrectLengthStrings(): void
    {
        $stringLength = rand(1, 10);
        $arrayLength = rand(1, 10);

        $generator = new ArrayGenerator($arrayLength, $stringLength);  
        $randomStringArray = $generator->get();

        $this->assertSame($arrayLength, count($randomStringArray));
    }

    public function testShouldThrowAnExceptionWhenArraySizeIsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $stringGenerator = new StringGenerator(1);
        new ArrayGenerator(0, 1, $stringGenerator); 

    }

    public function testShouldThrowAnExceptionWhenStringLengthIsZero(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $stringGenerator = new StringGenerator(1);
        new ArrayGenerator(1, 0, $stringGenerator); 
    }
}