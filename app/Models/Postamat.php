<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postamat extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'system_id',
        'address',
        'serial_number'
    ];

    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i:s',
        'updated_at' => 'datetime:d/m/Y, H:i:s'
    ];
}
