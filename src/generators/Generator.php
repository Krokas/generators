<?php

namespace Generators;

use Converters\Converter;

interface Generator
{
    public function get();
    public function applyConverter(Converter $converter);
}