<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Filiere;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.eleves.eleves', [
            'eleves' => Student::with('filiere')->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.eleves.create',
            [
                'filieres' => Filiere::all()->map(function ($filiere) {
                    return [
                        'filiere' => $filiere->name,
                        'key' => $filiere->id,
                    ];
                }),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validateData = $request->except('filiere');
        $validateData['filiere_id'] = $request->validated('filiere');

        Student::create($validateData);

        return redirect()->route('students.index')->with('success', 'Eleve creé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.eleves.edit', [
            'eleve' => $student,
            'filieres' => Filiere::all()->map(function ($filiere) {
                return [
                    'filiere' => $filiere->name,
                    'key' => $filiere->id,
                ];
            }),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedData = $request->except('filiere');
        $validatedData['filiere_id'] = $request->validated('filiere');

        // modifier
        $student->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Eleve modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete;

        return redirect()->route('students.index')->with('success', 'Eleve supprimé ');
    }
}
