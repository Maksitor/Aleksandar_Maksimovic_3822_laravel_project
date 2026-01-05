<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProizvodniProces extends Model
{
    use HasFactory;

    protected $table = 'proizvodni_proces'; // Tvoja tabela

    protected $fillable = [
        'serijski_broj',
        'proizvod_id',
        'vrsta_cokolade_id', // OBAVEZNO dodati ovde
        'kolicina_proizvoda',
        'datum_pocetka',
        'datum_zavrsetka',
        'status',
        'napomena',
    ];

    // Relacija ka proizvodu
    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }

    // Relacija ka vrsti čokolade
    public function vrstaCokolade()
    {
        return $this->belongsTo(VrstaCokolade::class, 'vrsta_cokolade_id');
    }
}
