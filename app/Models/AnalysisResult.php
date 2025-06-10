<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalysisResult extends Model
{
    protected $fillable = [
        'user_id',
        'filename',
        'similarity',
        'tema',
        'narasi',
        'makna_moral'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
