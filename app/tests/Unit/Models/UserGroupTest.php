<?php

namespace Tests\Unit\Models;

use App\Models\UserGroup;
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
}
