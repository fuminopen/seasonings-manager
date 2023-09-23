<?php

namespace App\Models;

use App\ValueObjects\Remaining;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 調味料
 *
 * @property string $name
 * @property Remaining $remaining
 */
final class Seasoning extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'group_id',
        'remaining',
    ];

    /**
     * 残量を取得する
     *
     * @return Remaining
     */
    public function getRemaining(): Remaining
    {
        return $this->remaining;
    }

    /**
     * 残量を設定する
     *
     * @param  Remaining $remaining
     * @return self
     */
    public function setRemaining(Remaining $remaining): self
    {
        $this->remaining = $remaining;

        return $this;
    }

    /**
     * 名前を取得する
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * 名前を指定して調味料を作成する
     *
     * @param  string $name
     * @return self
     */
    public static function createWithName(string $name): self
    {
        return new self([
            'name' => $name,
            'remaining' => Remaining::createAsFull(),
        ]);
    }

    /**
     * 残量がMaxである
     *
     * @return bool
     */
    public function isFull(): bool
    {
        return $this->remaining->isFull();
    }
}
