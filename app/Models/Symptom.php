<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;

    protected $table = "gejala";

    protected $fillable = ['kode', 'nama'];

    public function aturan() {
        return $this->belongsToMany(Rule::class, 'aturan_gejala', 'aturan_id', 'gejala_id');
    }

    public function aturan_tsukamoto() {
        return $this->belongsToMany(AturanTsukamoto::class, 'aturan_tsukamoto_gejala', 'aturan_tsukamoto_id', 'himpunan_id')->withTimestamps();
    }

    public function konsultasi() {
        return $this->belongsToMany(Consultation::class, 'gejala_konsultasi', 'konsultasi_id', 'gejala_id')->withTimestamps()->withPivot(['keterangan', 'nilai']);
    }

    public function himpunan() {
        return $this->hasMany(Himpunan::class, 'gejala_id');
    }
   
}
