<?php

namespace App\Models;

use App\ValueObjects\Remaining;
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

    /**
     * 調味料を作成する
     *
     * @param string $seasoningName
     * @return Seasoning
     */
    public function createSeasoning(string $seasoningName): Seasoning
    {
        $seasoning = new Seasoning([
            'name' => $seasoningName,
            'group_id' => $this->id,
            'remaining' => 100,
        ]);
        $seasoning->save();

        return $seasoning;
    }
}
