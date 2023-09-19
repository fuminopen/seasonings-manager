<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * ユーザーグループ
     *
     * @return HasMany
     */
    public function userGroup(): HasMany
    {
        return $this->hasMany(UserGroup::class);
    }

    /**
     * 新しいユーザーを作成する
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return self
     */
    public static function createNew(string $name, string $email, string $password): self
    {
        $user = new self([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        $user->save();

        return $user;
    }

    /**
     * 新しいグループを作成する
     *
     * @param string $groupName
     * @return Group
     */
    public function createGroup(string $groupName): Group
    {
        $group = Group::createNew($groupName);

        UserGroup::createNewAsAdmin(
            $this->id,
            $group->id,
        );

        return $group;
    }
}
