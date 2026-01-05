<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narudzbina extends Model
{
    use HasFactory;

    protected $fillable = [
        'ime_kupca',
        'email',
        'telefon',
        'adresa',
        'napomena',
        'broj_narudzbine',
        'proizvod_id',
        'kolicina',
        'ukupna_cena',
        'status'
    ];

    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }
}