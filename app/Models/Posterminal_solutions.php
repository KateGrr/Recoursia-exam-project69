<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posterminal_solutions extends Model
{
    use HasFactory;

    protected $table = 'posterminal_solutions';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i',
    ];

    public function theme()
    {
        return $this->belongsTo(Posterminal_themes::class, 'theme_id', 'id');
    }
}
