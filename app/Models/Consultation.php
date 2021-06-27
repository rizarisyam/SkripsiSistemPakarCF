<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = "konsultasi";
    protected $fillable = ['user_id', 'nilai', 'cf_user'];

    public function gejala() {
        return $this->belongsToMany(Symptom::class, 'gejala_konsultasi', 'konsultasi_id', 'gejala_id')->withTimestamps()->withPivot(['keterangan', 'nilai']);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
