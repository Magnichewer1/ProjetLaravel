<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// Obligatoire pour avoir accès au modèle
use App\Models\Membre;

class ControleurMembres extends Controller
{
    public function index()
    {
        $les_membres = Membre::all();
        return view('pages_site/membres', compact('les_membres'));
    }
}
