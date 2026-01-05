<?php

namespace App\Http\Controllers;

use App\Models\Sirovina;
use Illuminate\Http\Request;

class SirovinaController extends Controller
{
    /**
     * JAVNA STRANICA: Prikaz stanja sirovina
     * Ova metoda se poziva za /sirovine/stanje
     */
    public function indexPublic()
    {
        $sirovine = Sirovina::all();
        return view('sirovine.stanje', compact('sirovine'));
    }
    
    /**
     * ADMIN: Prikaz svih sirovina (CRUD)
     * Ova metoda se poziva za /admin/sirovine
     */
    public function index()
    {
        $sirovine = Sirovina::all();
        return view('admin.sirovine.index', compact('sirovine'));
    }
    
    // Dodaj i ostale CRUD metode ako ne postoje:
    public function create()
    {
        return view('admin.sirovine.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'kolicina' => 'required|numeric|min:0',
            'jedinica_mere' => 'required|string|max:50',
            'minimalna_kolicina' => 'nullable|numeric|min:0',
        ]);
        
        Sirovina::create($validated);
        
        return redirect()->route('admin.sirovine.index')
            ->with('success', 'Sirovina uspešno dodata!');
    }
    
    public function edit(Sirovina $sirovina)
    {
        return view('admin.sirovine.edit', compact('sirovina'));
    }
    
    public function update(Request $request, Sirovina $sirovina)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'kolicina' => 'required|numeric|min:0',
            'jedinica_mere' => 'required|string|max:50',
            'minimalna_kolicina' => 'nullable|numeric|min:0',
        ]);
        
        $sirovina->update($validated);
        
        return redirect()->route('admin.sirovine.index')
            ->with('success', 'Sirovina uspešno ažurirana!');
    }
    
    public function destroy(Sirovina $sirovina)
    {
        $sirovina->delete();
        
        return redirect()->route('admin.sirovine.index')
            ->with('success', 'Sirovina uspešno obrisana!');
    }
}