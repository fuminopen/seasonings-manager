<?php

namespace Tests\Unit\Models;

use App\Exceptions\ValueObjects\InvalidRemainingException;
use App\Models\Seasoning;
use App\ValueObjects\Remaining;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class SeasoningTest extends TestCase
{
    /**
     * 調味料は取得できる
     *
     * @test
     */
    public function canGetRemainingQuantity(): void
    {
        Model::unguard();

        $sut = new Seasoning([
            'remaining' => new Remaining(98),
        ]);

        $this->assertSame(
            98,
            $sut->getRemaining()->value
        );
    }

    /**
     * 調味料は残量を設定できる
     *
     * @test
     */
    public function canSetRemainingQuantity(): void
    {
        Model::unguard();

        $sut = new Seasoning([
            'remaining' => new Remaining(100),
        ]);

        $sut->setRemaining(new Remaining(50));

        $this->assertSame(
            50,
            $sut->getRemaining()->value
        );
    }

    /**
     * 残量は0 ~ 100の間
     *
     * @test
     * @dataProvider invalidRemainingProvider
     */
    public function remainingMustBeBetween0To100(int $remaining): void
    {
        Model::unguard();

        $sut = new Seasoning([
            'remaining' => 100,
        ]);

        $this->expectException(InvalidRemainingException::class);

        $sut->setRemaining(new Remaining($remaining));
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
