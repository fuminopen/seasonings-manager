<?php

namespace App\ValueObjects;

use App\Exceptions\ValueObjects\InvalidRemainingException;

/**
 * @property-read int $value
 */
final class Remaining
{
    /**
     * 最小量
     */
    private const MIN = 0;

    /**
     * 最大量
     */
    private const MAX = 100;

    public function __construct(public readonly int $value)
    {
        if ($value > self::MAX || $value < self::MIN) {
            throw new InvalidRemainingException();
        }
    }

    /**
     * 最大量で新しいインスタンスを作成する
     *
     * @return self
     */
    public static function createAsFull(): self
    {
        return new self(self::MAX);
    }
}
