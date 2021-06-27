<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $table = 'aturan';

    protected $fillable =['kode', 'penyakit_id', 'cf'];

    public function gejala() {
        return $this->belongsToMany(Symptom::class, 'aturan_gejala', 'aturan_id', 'gejala_id')->withTimestamps();
    }

    public function penyakit() {
        return $this->belongsTo(Disease::class, 'penyakit_id');
    }
}
