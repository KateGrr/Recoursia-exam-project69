<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postamat extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function requests()
    {
        return $this->hasMany(PostamatRequest::class, 'postamat_id', 'id');
    }

    protected $fillable = [
        'status',
        'system_id',
        'address',
        'serial_number'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
