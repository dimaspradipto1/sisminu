<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anggotaSuratKeluar()
    {
        return $this->hasMany(AnggotaSuratKeluar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
