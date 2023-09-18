<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * ユーザーはグループを作成できる
     *
     * @test
     */
    public function userCanCreateAGroup(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/group', [
            'user_id' => $user->id,
            'group_name' => $this->faker->company(),
        ]);

        $response->assertStatus(200);
    }
}
