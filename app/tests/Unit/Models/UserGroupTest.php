<?php

namespace Tests\Unit\Models;

use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class UserGroupTest extends TestCase
{
    /**
     * 管理者として新しいインスタンスを作成できる
     *
     * @test
     */
    public function canCreateSelfAsAdmin(): void
    {
        $result = UserGroup::createNewAsAdmin(3, 10);

        $this->assertSame(
            3,
            $result->user_id
        );
        $this->assertSame(
            10,
            $result->group_id
        );
        $this->assertTrue(
            $result->isAdmin()
        );
    }

    /**
     * 管理者であることを判定できる
     *
     * @test
     * @dataProvider adminProvider
     */
    public function canJudgeIfTheInstanceIsAdmin(
        int $userTypeId,
        bool $expected,
    ): void {
        Model::unguard();

        $sut = new UserGroup([
            'user_type_id' => $userTypeId,
        ]);

        $this->assertSame(
            $expected,
            $sut->isAdmin()
        );
    }

    public static function adminProvider(): array
    {
        return [
            [0, false],
            [1, true],
            [2, false],
        ];
    }
}
