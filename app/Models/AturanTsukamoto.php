<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturanTsukamoto extends Model
{
    use HasFactory;

    protected $table = "aturan_tsukamoto";

    protected $fillable = ['kode','penyakit_id','himpunan_id'];

    public function himpunan() {
        return $this->belongsToMany(Himpunan::class, 'aturan_tsukamoto_gejala', 'aturan_tsukamoto_id', 'himpunan_id')->withTimestamps();
    }

    public function gejala() {
        return $this->belongsToMany(Symptom::class, 'aturan_tsukamoto_gejala', 'aturan_tsukamoto_id', 'himpunan_id')->withTimestamps();
    }

    public function penyakit() {
        return $this->belongsTo(Disease::class, 'penyakit_id');
    }
}
