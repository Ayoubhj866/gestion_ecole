<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorInstructeur;
use App\Http\Requests\UpdateInstructeur;
use App\Models\Instructeur;
use App\Models\Matiere;

class InstructeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.instructeurs.instructeurs', [
            'instructeurs' => Instructeur::orderBy('created_at', 'desc')->paginate(15),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instructeurs.create', [
            'matieres' => Matiere::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorInstructeur $request)
    {
        $data = $request->validated();

        // creation de l'instructeur
        $instructeur = Instructeur::create($data);

        // attacher les matieres avec l'instructeur
        $instructeur->matieres()->attach($data['matieres']);

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur criée');
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
    public function edit(Instructeur $instructeur)
    {
        return view('admin.instructeurs.edit', [
            'instructeur' => $instructeur,
            'matieres' => Matiere::pluck('name', 'id'),
            'matieresSelected' => $instructeur->matieres()->pluck('matiere_id'), // les matiéres déja attribuées à l'instructeur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructeur $request, Instructeur $instructeur)
    {
        $data = $request->validated();
        // modification des données personnelles
        $instructeur->update($data);

        // sychroniser les matières
        $instructeur->matieres()->sync($data['matieres']);

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructeur $instructeur)
    {
        $instructeur->delete();

        return redirect()->route('instructeurs.index')->with('success', 'Instructeur supprimé');
    }
}
