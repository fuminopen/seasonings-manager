<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    /**
     * 新規ユーザーを作成できる
     *
     * @test
     */
    public function canCreateNewUser(): void
    {
        $name = $this->faker->name();
        $email = $this->faker->email();
        $password = $this->faker->password();

        $result = User::createNew($name, $email, $password);

        $this->assertSame(
            $name,
            $result->name,
        );
        $this->assertSame(
            $email,
            $result->email,
        );
        $this->assertTrue(
            Hash::check($password, $result->password)
        );
    }

    /**
     * 新規グループを作成できる
     *
     * @test
     */
    public function canCreateGroup(): void
    {
        $user = User::createNew(
            $this->faker->name(),
            $this->faker->email(),
            $this->faker->password()
        );

        $groupName = $this->faker->company();

        $result = $user->createGroup($groupName);

        $this->assertSame(
            $groupName,
            $result->name,
        );
    }
}
