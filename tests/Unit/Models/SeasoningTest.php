<?php

namespace Tests\Unit\Models;

use App\Models\Seasoning;
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
            'remaining' => 98,
        ]);

        $this->assertSame(
            98,
            $sut->getRemaining()
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
            'remaining' => 100,
        ]);

        $sut->setRemaining(50);

        $this->assertSame(
            50,
            $sut->getRemaining()
        );
    }

    /**
     * 残量は0 ~ 100の間
     *
     * @test
     */
    public function remainingMustBeBetween0To100(): void
    {
        Model::unguard();

        $sut = new Seasoning([
            'remaining' => 100,
        ]);

        $this->expectException(InvalidRemainingException::class);

        $sut->setRemaining(101);
    }
}
