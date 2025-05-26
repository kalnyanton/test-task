<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $username
 * @property string $phone_number
 * @property string $link
 * @property Carbon $link_expires_at
 * @property boolean $active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class GameAccount extends Model
{
    protected $fillable = ['username', 'phone_number', 'link', 'link_expires_at', 'active'];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'link_expires_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
