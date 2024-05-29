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
        $role = Auth::user()->getRoleNames()['0']; // soit admin, eleve ou instructeur

        $route = $role.'.dashboard';

        return view($route, [
            // seulement pour l'admin
            'count_instructeurs' => $role === 'admin' ? Instructeur::count() : null,
            'count_eleves' => $role === 'admin' ? Eleve::count() : null,
            'count_matieres' => $role === 'admin' ? Matiere::count() : null,
            'count_filieres' => $role === 'admin' ? Filiere::count() : null,
        ]);
    }
}
