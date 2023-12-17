<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posterminal_themes extends Model
{
    use HasFactory;

    protected $table = 'posterminal_themes';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];

    public function solutions()
    {
        return $this->hasMany(Posterminal_solutions::class, 'theme_id', 'id');
    }

}
