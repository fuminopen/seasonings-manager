<?php

namespace App\Models;

use App\ValueObjects\Remaining;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Seasoning extends Model
{
    use HasFactory;

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
}
