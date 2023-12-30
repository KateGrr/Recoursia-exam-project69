<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardomat_solutions extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id', 
        'title', 
        'created_at', 
        'updated_at'
    ];

    public function theme()
    {
        return $this->belongsTo(Cardomat_themes::class, 'theme_id', 'id');
    }

    public function cardomat_requests()
    {
        return $this->hasOne(Cardomat_requests::class, 'solution_id', 'id');
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];
}
