<?php

namespace Generators;
use Generators\StringGenerator;
use Generators\Generator;
use Converters\Converter;

class ArrayGenerator implements Generator
{
    private array $array;

    public function __construct(
        int $arraySize,
        int $stringLength)
    {
        if ($arraySize == 0) {
            throw new \InvalidArgumentException("array size cannot be 0");
        }
        
        if ($stringLength == 0) {
            throw new \InvalidArgumentException("string size cannot be 0");
        }

        $result = [];

        for ($i = 0; $i < $arraySize; $i++) {
            array_push($result, new StringGenerator($stringLength));
        }

        $this->array = $result;
    }

    public function get() : array
    {
        return $this->array;
    }

    public function applyConverter(Converter $converter) : void
    {
        foreach($this->array as $index => $item) {
            $this->array[$index] = $converter->convert($item->get());
        }
    }
};