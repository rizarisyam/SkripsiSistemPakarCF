<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Himpunan extends Model
{
    use HasFactory;

    protected $table = "himpunan";
    protected $fillable = [
        'gejala_id',
        'himpunan',
        'semesta',
        'domain'
    ];
    

    public function gejala() {
        return $this->belongsTo(Symptom::class, 'gejala_id');
    }

    public function aturan_tsukamoto() {
        return $this->belongsToMany(AturanTsukamoto::class, 'aturan_tsukamoto_id', 'himpunan_id');
    }
}
