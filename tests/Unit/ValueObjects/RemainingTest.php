<?php

namespace Tests\Unit\ValueObjects;

use App\Exceptions\ValueObjects\InvalidRemainingException;
use App\ValueObjects\Remaining;
use PHPUnit\Framework\TestCase;

class RemainingTest extends TestCase
{
    /**
     * 残量は0 ~ 100の間
     *
     * @test
     * @dataProvider invalidRemainingProvider
     */
    public function remainingMustBeBetween0To100(int $remaining): void
    {
        $this->expectException(InvalidRemainingException::class);

        new Remaining($remaining);
    }

    /**
     * Maxの状態で新しいインスタンスを作成することができる
     *
     * @test
     */
    public function canCreateNewFullInstance(): void
    {
        $result = Remaining::createAsFull()->value;

        $this->assertSame(
            100,
            $result
        );
    }

    /**
     * 不正な残量
     */
    public static function invalidRemainingProvider(): array
    {
        return [
            [-1,],
            [101,],
        ];
    }
}
