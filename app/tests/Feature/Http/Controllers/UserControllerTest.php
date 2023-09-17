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
     * @test
     */
    public function canCreateNewUser(): void
    {
        $response = $this->post(
            '/user',
            [
                'name' => $this->faker->userName(),
                'email' => $this->faker->safeEmail(),
                'password' => $this->faker->password(),
            ],
            [
                'Accept' => 'application/json',
            ]
        );

        $response->assertStatus(200);
    }
}
