<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Biographie;
use App\Models\Membre;

use Illuminate\Support\Facades\Auth;

class ControleurMembres extends Controller
{
    // des variables
    protected $les_membres;
    protected $soumissions;

    public function __construct( Membre $membres, Request $requetes) {
        $this->les_membres = $membres;
        $this->soumissions = $requetes;
    }
    public function index() {
        $les_membres = $this->les_membres->all();
        return view('pages_site/consultation_edition', compact('les_membres'));
    }
    public function afficher($numero) {
        $utilisateur = Auth::user();
        
        
        $un_membre = Membre::find($numero);
        /* if (!$un_membre) {
            // Si le membre n'existe pas, afficher une page d'erreur
            return view('pages_site/erreur');
        }
    
        // Si le membre existe, vérifier l'autorisation d'accès
        if ($utilisateur->id !== $un_membre->id) {
            abort(403, "Vous n'avez pas l'autorisation de voir ce profil.");
        } */
        
        return view('pages_site/membre', compact('un_membre'));
    }
    
    public function creer() {
        return view('pages_site/creation');
    }
    public function enregistrer(Request $request) {
        $membre = new membre();
        $membre->nom = $request->nom;
        $membre->adresse = $request->adresse;
        $membre->prenom = $request->prenom;
        $membre->save();
        $membre->biographie()->updateOrCreate(
            ['membre_id' => $membre->id],
            ['description' => $request->input('description')]
        );
        return "Membre créé";
    }
    public function editer($numero) {
        $utilisateur = Auth::user();
        
        $un_membre = Membre::find($numero);
       
        /* if (!$un_membre) {
        
            return view('pages_site/erreur');
        }
        
        
        if ($utilisateur->id !== $un_membre->id) {
            abort(403, "Vous n'avez pas l'autorisation de modifier ce profil.");
        }  */
        
        return view('pages_site/edition', compact('un_membre'));
    }
    
    public function miseAJour($numero) {
        if (Auth::check()){
            $un_membre = $this->les_membres->find($numero);
            $la_soumission = $this->soumissions;
            $un_membre->nom =$la_soumission->nom;
            $un_membre->prenom =$la_soumission->prenom;
            $un_membre->adresse =$la_soumission->adresse;
            if (isset($un_membre->biographie['description'])) {
                $biographieDescription = $un_membre->biographie['description'];
    
                if ($un_membre->biographie) {
                    
                    $un_membre->biographie->description = $biographieDescription;
                    $un_membre->biographie->save();
                } else {
                    
                    $un_membre->biographie()->create([
                        'description' => $biographieDescription
                    ]);
                }
            }
            $un_membre->save();
            return "Membre modifié";
        } else {
            echo "<h1>Accès non autorisé</h1>";
        }
    }
    public function identite() {
        if (Auth::check()){
            $utilisateur = Auth::user();
            $id = Auth::id();
            return view('pages_site/identite',compact('utilisateur','id'));
        } else {
            echo "<h1>Accès non autorisé</h1>";
        }
    }
    public function acces_protege() {
        $infos_utilisateur = Auth::user();
        $utilisateur = $infos_utilisateur->name;
        echo "<h1>Utilisateur authentifié : ".$utilisateur."</h1>";
    }

}
