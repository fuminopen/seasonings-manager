<?php

namespace App\ValueObjects;

use App\Exceptions\ValueObjects\InvalidRemainingException;

final class Remaining
{
    public function __construct(int $remaining)
    {
        if ($remaining > 100 || $remaining < 0) {
            throw new InvalidRemainingException();
        }
    }
}
