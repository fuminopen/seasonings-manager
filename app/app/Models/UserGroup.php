<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    /**
     * 新しいインスタンスを作成する
     *
     * @param int $userId
     * @param int $groupId
     * @return self
     */
    public static function createNew(int $userId, int $groupId): self
    {
        return new self([
            'user_id' => $userId,
            'group_id' => $groupId,
        ]);
    }
}
