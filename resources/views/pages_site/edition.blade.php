@extends('pages_site/fond')

@section('titre')
Club des Usagers de l'Espace galactique
@stop
@section('titre_contenu')
Modification des infos du membre
@stop
@section('contenu')
<div class="formgroup">
<form action="{{ route('miseAJour', $un_membre->id) }}" method="POST">
    @csrf
    @method('PATCH')


    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" value="{{ old('nom', $un_membre->nom) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $un_membre->prenom) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse électronique</label>
        <input type="email" id="adresse" name="adresse" value="{{ old('adresse', $un_membre->adresse) }}" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Biographie</label>
        <textarea class="form-control" id="description" name="description">{{ $membre->biographie->description ?? '' }}</textarea>
    </div>

    <button type="submit" class="btn btn-info">Modifier membre</button>
</form>
</div>
@stop
@section('pied_page')
LP3MI 2025
@stop