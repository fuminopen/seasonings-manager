<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    /**
     * 管理者として新しいインスタンスを作成する
     *
     * @param int $userId
     * @param int $groupId
     * @return self
     */
    public static function createNewAsAdmin(int $userId, int $groupId): self
    {
        return self::createNew(
            $userId,
            $groupId,
            config('const.db.seasonings.user_types.admin.id')
        );
    }

    /**
     * 新しいインスタンスを作成する
     *
     * @param int $userId
     * @param int $groupId
     * @param int $userTypeId
     * @return self
     */
    private static function createNew(
        int $userId,
        int $groupId,
        int $userTypeId,
    ): self {
        return new self([
            'user_id' => $userId,
            'group_id' => $groupId,
            'user_type_id' => $userTypeId,
        ]);
    }

    /**
     * 管理者である
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->user_type_id === config('const.db.seasonings.user_types.admin.id');
    }
}
