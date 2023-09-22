<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * 新規ユーザーの作成をリクエストすると200が返ってくる
     *
     * @test
     */
    public function createUserReturns200(): void
    {
        $name = $this->faker->userName();
        $email = $this->faker->safeEmail();
        $password = $this->faker->password();

        $response = $this->post(
            '/users',
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(200);

        $this->assertDatabaseHas(
            'users',
            [
                'name' => $name,
                'email' => $email,
            ]
        );
    }
}
