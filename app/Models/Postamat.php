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
}
