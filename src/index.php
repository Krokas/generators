<?php
include_once("generators/StringGenerator.php");


use Generators\StringGenerator;

echo StringGenerator::generate(5)."\n";

var_dump(StringGenerator::generateArray(4, 10))."\n";