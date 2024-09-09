<?php

namespace App\Generators;

use App\Converters\Converter;

interface Generator
{
    public function get();
    public function applyConverter(Converter $converter);
}