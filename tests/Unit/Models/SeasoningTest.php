<?php

namespace Tests\Unit\Models;

use App\Models\Seasoning;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class SeasoningTest extends TestCase
{
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
}
