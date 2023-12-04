<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'address',
        'system_id',
        'status',
        'serial_number',
    ];
    
    protected $guarded = ['id'];
}