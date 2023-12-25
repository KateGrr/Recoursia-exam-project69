<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostamatSolution extends Model
{
    use HasFactory;

    public function theme()
    {
        return $this->belongsTo(PostamatTheme::class, 'theme_id', 'id');
    }

    protected $fillable = [
        'title',
        'theme_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
