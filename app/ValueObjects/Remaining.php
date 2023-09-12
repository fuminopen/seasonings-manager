<?php

namespace App\ValueObjects;

use App\Exceptions\ValueObjects\InvalidRemainingException;

final class Remaining
{
    public function __construct(public readonly int $value)
    {
        if ($value > 100 || $value < 0) {
            throw new InvalidRemainingException();
        }
    }
}
