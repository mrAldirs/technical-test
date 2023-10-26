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
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'nip' => 'required|unique:employees',
        'nomor_telpon' => 'required|numeric',
        'tanggal_lahir' => 'required',
        'departemen' => 'required',
        'tahun_lahir' => 'required|numeric',
        'alamat' => 'required',
        'agama' => 'required',
        'foto' => 'required|mimes:png,jpg,jpeg,gif'
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
