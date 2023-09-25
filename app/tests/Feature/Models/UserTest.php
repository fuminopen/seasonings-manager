<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * グループ新規作成時にDBに対して適切にレコードを作成することができる
     *
     * @test
     */
    public function canSaveGroupOnDb(): void
    {
        $this->seed();

        /**
         * 準備
         */
        $user = User::factory()->create();

        /**
         * 実行
         */
        $group = $user->createGroup('グループ名');

        /**
         * 検証
         */
        $this->assertSame(
            'グループ名',
            $group->name,
        );

        $this->assertDatabaseHas(
            'groups',
            [
                'id' => $group->id,
            ]
        );
        $this->assertDatabaseHas(
            'user_groups',
            [
                'user_id' => $user->id,
                'group_id' => $group->id,
            ]
        );
    }
}
