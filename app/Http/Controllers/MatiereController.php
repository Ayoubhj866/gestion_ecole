<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.matieres.matieres', [
            'matieres' => Matiere::orderBy('created_at', 'desc')->paginate(8),
            'filieres' => Filiere::pluck('name', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'filiere' => ['array', 'required', 'exists:filieres,id'],
        ]);

        // crier la matière
        $matiere = Matiere::create($validatedData);

        //attaché la matière avec des filières
        $matiere->filieres()->attach($validatedData['filiere']);

        return redirect()->route('matieres.index')->with('success', 'Matière criée avec succée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        return view('admin.matieres.adit', [
            'matiere' => $matiere,
            'filieresSelected' => $matiere->filieres()->pluck('filiere_id'), // filiere_id pivot table
            'filieres' => Filiere::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'filiere' => ['array', 'required'],
        ]);

        //modification
        $matiere->update($validatedData);

        // asynchronisation
        $matiere->filieres()->sync($validatedData['filiere']);

        return redirect()->route('matieres.index')->with('success', 'Matiere modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();

        return redirect()->route('matieres.index')->with('info', 'Matère supprimée');
    }
}
