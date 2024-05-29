<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Filiere;
use App\Models\Instructeur;
use App\Models\Matiere;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->getRoleNames()['0'];

        $route = $role.'.dashboard';

        return view($route, [
            'instructeurs' => $role === 'admin' ? Instructeur::count() : null,
            'eleves' => $role === 'admin' ? Eleve::count() : null,
            'matieres' => $role === 'admin' ? Matiere::count() : null,
            'filieres' => $role === 'admin' ? Filiere::count() : null,
        ]);
    }
}
