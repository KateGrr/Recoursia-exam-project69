<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostamatRequest extends Model
{
    use HasFactory;

    public function postamat()
    {
        return $this->belongsTo(Postamat::class, 'postamat_id', 'id');
    }

    public function theme()
    {
        return $this->hasOne(PostamatTheme::class, 'theme_id');
    }

    public function solution()
    {
        return $this->hasOne(PostamatSolution::class, 'solution_id');
    }

    protected $fillable = [
        'status',
        'postamat_id',
        'theme_id',
        'solution_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
