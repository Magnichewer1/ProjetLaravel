<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showUsersEnAttente()
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Accès interdit pour les non admins');
        }
        $users = User::where('is_approved', false)->get();

        
        return view('pages_site/inscriptions', compact('users'));
    }

    
    public function approveUser($id)
    {
        if (!Auth::user()->is_admin) {
            abort(403, 'Accès interdit pour les non admins');
        }
       /*  $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'Utilisateur non trouvé.');
        }

        
        if (!$user->name) {
            return redirect()->route('admin.users')->with('error', 'L\'utilisateur ne peut pas être approuvé car il manque des informations.');
        }

     */
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur approuvé.');
    }

}
