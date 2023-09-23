<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeasoningControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * 新規調味料を作成できる
     *
     * @test
     */
    public function canCreateSeasonings(): void
    {
        $this->seed();

        $user = User::factory()->create();
        $group = $user->createGroup($this->faker->company());

        $seasoningName = $this->faker->word();

        $this->post('/seasonings', [
            'user_id' => $user->id,
            'group_id' => $group->id,
            'name' => $seasoningName,
        ])->assertOk();

        $this->assertDatabaseHas(
            'seasonings',
            [
                'group_id' => $group->id,
                'name' => $seasoningName,
            ]
        );
    }
}
