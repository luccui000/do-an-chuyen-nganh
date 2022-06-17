<?php

namespace App\Contracts;

interface ValueObject
{
    public function toArray(): array;
}
