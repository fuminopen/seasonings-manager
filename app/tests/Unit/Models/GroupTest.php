<?php

namespace Tests\Unit\Models;

use App\Models\Group;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use WithFaker;

    /**
     * 新規グループを追加できる
     *
     * @test
     */
    public function canCreateNewGroup(): void
    {
        $groupName = $this->faker->company();

        $result = Group::createNew($groupName);

        $this->assertSame(
            $groupName,
            $result->name
        );
    }
}
