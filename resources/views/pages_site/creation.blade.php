@extends('pages_site/fond')
@section('entete')
@stop
@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
Création d'un nouveau membre
@stop
@section('contenu')
<div class="form-group">
    <form action="{{ url('creation/membre') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse électronique</label>
            <input type="email" id="adresse" name="adresse" class="form-control" required>
        </div>

        <div class="form-group">
        <label for="description">Biographie</label>
        <textarea class="form-control" id="description" name="description">{{ $membre->biographie->description ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer un membre</button>
    </form>
</div>

@stop
@section('pied_page')
LP3MI 2025
@stop
