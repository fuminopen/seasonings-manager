<?php

namespace Tests\Unit\Models;

use Tests\TestCase;

class UserGroupTest extends TestCase
{
    /**
     * 新しいインスタンスを作成できる
     *
     * @test
     */
    public function canCreateSelf(): void
    {
        $result = UserGroup::createNew(3, 10);

        $this->assertSame(
            3,
            $result->user_id
        );
        $this->assertSame(
            10,
            $result->group_id
        );
    }
}
