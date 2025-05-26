<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $game_account_id
 * @property int $quantity
 * @property string $result
 * @property int $win_amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Game extends Model
{
    protected $fillable = ['game_account_id', 'quantity', 'result', 'win_amount'];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
