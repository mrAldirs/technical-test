<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'nama',
        'nip',
        'position_id',
        'departemen',
        'tanggal_lahir',
        'tahun_lahir',
        'alamat',
        'nomor_telpon',
        'agama',
        'status',
        'foto'
    ];

    /**
     * Get the position that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
