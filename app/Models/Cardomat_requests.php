<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardomat_requests extends Model
{
    use HasFactory;

    protected $fillable = [
        'status', 
        'cardomat_id', 
        'theme_id', 
        'solution_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];

    public function cardomat()
    {
        return $this->belongsTo(Card::class, 'cardomat_id', 'id');
    }

    public function theme()
    {
        return $this->belongsTo(Cardomat_themes::class, 'theme_id', 'id');
    }

    public function solution()
    {
        return $this->belongsTo(Cardomat_solutions::class, 'solution_id', 'id');
    }
}
