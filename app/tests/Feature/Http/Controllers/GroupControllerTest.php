<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * グループを作成することができる
     *
     * @test
     */
    public function canCreateGroup(): void
    {
        $this->seed();

        $user = User::factory()->create();

        $groupName = $this->faker->company();

        // 事前確認
        $groups = Group::whereName($groupName)->get();

        $this->assertTrue(
            $groups->isEmpty()
        );

        $response = $this->post('/groups', [
            'user_id' => $user->id,
            'group_name' => $groupName,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas(
            'groups',
            [
                'name' => $groupName,
            ]
        );

        $groups = Group::whereName($groupName)->get();

        $this->assertSame(
            1,
            $groups->count()
        );

        $this->assertDatabaseHas(
            'user_groups',
            [
                'user_id' => $user->id,
                'group_id' => $groups->first()->id,
            ]
        );
    }
}
