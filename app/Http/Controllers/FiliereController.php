<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.filieres.filieres', [
            'filieres' => Filiere::orderBy('created_at', 'desc')->get(),
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
        // validation
        $validatedData = $request->validate(['name' => ['string', 'required', 'min:3', 'max:50']]);

        //store in database
        Filiere::create($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière criée avec succée');
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
    public function edit(Filiere $filiere)
    {
        return view('admin.filieres.edit', ['filiere' => $filiere]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filiere $filiere)
    {
        // validation
        $validatedData = $request->validate(['name' => ['string', 'required', 'min:3', 'max:50']]);

        //update
        $filiere->update($validatedData);

        return redirect()->route('filieres.index')->with('success', 'Filière modifiée');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiere $filiere)
    {
        $filiere->delete();

        return redirect()->route('filieres.index')->with('info', 'Filière supprimée');
    }
}
