<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardomat_themes extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',
        'created_at', 
        'updated_at'
    ];

    public function solutions()
    {
        return $this->hasMany(Cardomat_solutions::class, 'theme_id', 'id');
    }

    public function cardomat_requests()
    {
        return $this->hasOne(Cardomat_requests::class, 'theme_id', 'id');
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];
}
