<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostamatSolution extends Model
{
    use HasFactory;

    public function defectivePostamat()
    {
        return $this->belongsTo(DefectivePostamat::class, 'defective_id', 'id');
    }

    protected $fillable = [
        'title',
        'defective_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y, H:i',
        'updated_at' => 'datetime:d/m/Y, H:i'
    ];
}
