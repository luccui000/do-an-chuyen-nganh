<?php

namespace App\Contracts;

interface Factory
{
    public static function make(array $attributes): ValueObject;
}
