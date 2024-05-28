<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userConnected = Auth::user();

        $route = $userConnected->getRoleNames()['0'].'.dashboard';

        return view($route);
    }
}
