<?php
include_once(__DIR__."/../vendor/autoload.php");

use Symfony\Component\DependencyInjection\ContainerBuilder;

use App\Generators\StringGenerator;
use App\Generators\ArrayGenerator;
use App\Converters\AlphabeticalPositionConverter;
use App\Converters\Rot13Converter;

$container = new ContainerBuilder;

$container->setParameter("generator.string_length", 8);
$container->setParameter("generator.array_size", 10);

$container->register(StringGenerator::class, StringGenerator::class)
    ->addArgument("%generator.string_length%");
$container->register(ArrayGenerator::class, ArrayGenerator::class)
    ->addArgument("%generator.array_size%")
    ->addArgument("%generator.string_length%");
$container->register(AlphabeticalPositionConverter::class, AlphabeticalPositionConverter::class);
$container->register(Rot13Converter::class, Rot13Converter::class);


$generatorCollection = [$container->get(StringGenerator::class), $container->get(ArrayGenerator::class)];
$converters = [$container->get(AlphabeticalPositionConverter::class), $container->get(Rot13Converter::class)];

foreach($generatorCollection as $generator) {
    $randIndex = rand(0, count($converters) - 1);
    $generator->applyConverter($converters[$randIndex]);
}