<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Group;
use App\Models\Seasoning;
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
            'group_id' => $group->id,
            'seasoning_name' => $seasoningName,
        ])->assertOk();

        $this->assertDatabaseHas(
            'seasonings',
            [
                'group_id' => $group->id,
                'name' => $seasoningName,
            ]
        );
    }

    /**
     * 調味料を取得できる
     *
     * @test
     */
    public function canGetSeasonings(): void
    {
        $group = Group::factory()->create();

        $seasonings = Seasoning::factory(3)
            ->recycle($group)
            ->create();

        $response = $this->get('/seasonings', [
            'group_id' => $group->id,
        ]);

        $response->assertOk();

        $result = $response->json('data');

        $this->assertSame(
            3,
            count($result)
        );

        foreach ($result as $r) {
            $this->assertTrue(
                $seasonings->filter(
                    fn (Seasoning $seasoning) => $seasoning->id === $r->id
                )->isNotEmpty()
            );
        }
    }
}
