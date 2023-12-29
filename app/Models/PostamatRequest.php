<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostamatRequest extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 
        'created_at', 
        'updated_at'
    ];

    public function postamat()
    {
        return $this->belongsTo(Postamat::class, 'postamat_id', 'id');
    }

    public function theme()
    {
        return $this->belongsTo(PostamatTheme::class, 'theme_id', 'id');
    }

    public function solution()
    {
        return $this->belongsTo(PostamatSolution::class, 'solution_id', 'id');
    }

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
