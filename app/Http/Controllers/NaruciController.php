<?php

namespace App\Http\Controllers;

use App\Models\Narudzbina;
use App\Models\Proizvod;
use Illuminate\Http\Request;

class NaruciController extends Controller
{
    public function create()
    {
        $proizvodi = Proizvod::all();
        return view('naruci.create', compact('proizvodi'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime_kupca' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefon' => 'required|string|max:20',
            'proizvod_id' => 'required|exists:proizvodi,id',
            'kolicina' => 'required|integer|min:1',
            'adresa' => 'required|string|max:500',
            'napomena' => 'nullable|string|max:1000',
        ]);
        
        // Израчунај укупну цену
        $proizvod = Proizvod::findOrFail($validated['proizvod_id']);
        $ukupna_cena = $proizvod->cena * $validated['kolicina'];
        
        // Генериши број наруџбине
        $broj_narudzbine = 'NAR-' . date('Ymd') . '-' . str_pad(Narudzbina::count() + 1, 4, '0', STR_PAD_LEFT);
        
        // Креирај наруџбину
        Narudzbina::create([
            'ime_kupca' => $validated['ime_kupca'],
            'email' => $validated['email'],
            'telefon' => $validated['telefon'],
            'proizvod_id' => $validated['proizvod_id'],
            'kolicina' => $validated['kolicina'],
            'adresa' => $validated['adresa'],
            'napomena' => $validated['napomena'] ?? null,
            'broj_narudzbine' => $broj_narudzbine,
            'ukupna_cena' => $ukupna_cena,
        ]);
        
        return redirect()->back()->with('success', 'Narudžbina je uspešno kreirana!');
    }
}