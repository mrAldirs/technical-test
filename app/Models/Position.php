<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the employee for the Position
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employee()
    {
        return $this->hasMany(Position::class, 'position_id', 'id');
    }
}
