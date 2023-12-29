<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostamatTheme extends Model
{
    use HasFactory;

    public function solutions()
    {
        return $this->hasMany(PostamatSolution::class, 'theme_id', 'id');
    }

    public function request()
    {
        return $this->belongsTo(PostamatRequest::class, 'theme_id');
    }

    protected $fillable = [
        'title',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
