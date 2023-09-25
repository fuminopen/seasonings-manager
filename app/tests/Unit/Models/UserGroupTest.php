<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserGroupTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 管理者として新しいインスタンスを作成できる
     *
     * @test
     */
    public function canCreateSelfAsAdmin(): void
    {
        $this->seed();

        $user = User::factory()->create();
        $group = Group::factory()->create();

        $result = UserGroup::createNewAsAdmin($user->id, $group->id);

        $this->assertSame(
            $user->id,
            $result->user_id
        );
        $this->assertSame(
            $group->id,
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
