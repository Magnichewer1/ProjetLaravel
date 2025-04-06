<h2> Infos Membre </h2>
<h3>
    {{ $un_membre->prenom }} {{ $un_membre->nom }}
</h3>
<div class='h2'>
@auth
    {{ $un_membre->adresse }}
@else
    <p>Masqué</p>
@endauth
</div>
<div>
<p><strong>Biographie :</strong></p>
<p>{{ $un_membre->biographie->description ?? 'Aucune biographie disponible' }}</p>
</div>