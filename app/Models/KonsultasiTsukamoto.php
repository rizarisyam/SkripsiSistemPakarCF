<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiTsukamoto extends Model
{
    use HasFactory;

    protected $table = "konsultasi_tsukamoto";

    protected $fillable = [
        'user_id',
        'nilai',
        'fuzzy_user'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
