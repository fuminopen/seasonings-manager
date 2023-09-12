<?php

namespace App\Models;

use App\Exceptions\Models\InvalidRemainingException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Seasoning extends Model
{
    use HasFactory;

    /**
     * 残量を取得する
     *
     * @return int
     */
    public function getRemaining(): int
    {
        return $this->remaining;
    }

    /**
     * 残量を設定する
     *
     * @param  int $remaining
     * @return self
     */
    public function setRemaining(int $remaining): self
    {
        if ($remaining > 100 || $remaining < 0) {
            throw new InvalidRemainingException();
        }

        $this->remaining = $remaining;

        return $this;
    }
}
