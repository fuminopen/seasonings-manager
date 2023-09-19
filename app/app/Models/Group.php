<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * 新規グループを作成する
     *
     * @param string $name
     * @return self
     */
    public static function createNew(string $name): self
    {
        $group = new self([
            'name' => $name,
        ]);
        $group->save();

        return $group;
    }
}
