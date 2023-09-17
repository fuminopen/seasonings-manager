<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @test
     * @dataProvider newUserProvider
     */
    public function canCreateNewUser(
        string $name,
        string $email,
        string $password,
    ): void {
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

    public static function newUserProvider(): array
    {
        return [
            [
                'fuminopen',
                'fuminopen@example.com',
                'thisispassword',
            ],
            [
                'notfuminopen',
                'notfuminopen@example.com',
                'thisisnotpassword',
            ],
            [
                'newuser',
                'newuser@example.com',
                'newuserpassword',
            ],
        ];
    }
}
