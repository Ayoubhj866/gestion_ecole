<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatiereRequest;
use App\Models\Filiere;
use App\Models\Matiere;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.matieres.matieres', [
            'matieres' => Matiere::orderBy('created_at', 'desc')->paginate(8),
            'filieres' => Filiere::all()->map(function ($filiere) {
                return [
                    'filiere' => $filiere->name,
                    'key' => (string) $filiere->id,
                ];
            })->toArray(),
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
    public function store(MatiereRequest $request)
    {
        $validatedData = $request->validated();

        // crier la matière
        $matiere = Matiere::create($validatedData);

        //attaché la matière avec des filières
        $matiere->filieres()->attach($validatedData['filieres']);

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
        return view('admin.matieres.edit', [
            'matiere' => $matiere,
            'filieresSelected' => $matiere->filieres()->pluck('filiere_id'),
            'filieres' => Filiere::all()->map(function ($filiere) {
                return [
                    'filiere' => $filiere->name,
                    'key' => (string) $filiere->id,
                ];
            })->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatiereRequest $request, Matiere $matiere)
    {
        //récuperer les données validés
        $validatedData = $request->validated();

        //modification
        $matiere->update($validatedData);

        // asynchronisation
        $matiere->filieres()->sync($validatedData['filieres']);

        return redirect()->route('matieres.index')->with('success', 'Matière modifiée');
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
