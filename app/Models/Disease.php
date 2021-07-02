<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table = "penyakit";

    protected $fillable = ['kode', 'nama'];

    public function aturan_tsukamoto() {
        return $this->hasOne(AturanTsukamoto::class, 'penyakit_id');
    }
}
