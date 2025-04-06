<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- LP3MI -->
    <link rel='stylesheet' href='/css/mon_style.css'>
    @yield('entete')
    <title>
        @yield('titre')
    </title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('membres') }}">Voir tous les membres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('membre', ['numero' => 1]) }}">Voir un membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('creer') }}">Ajout d'un membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('modifier', ['id' => 1]) }}">Modification d'un membre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>


    <div class="container">
        <div class="titre_contenu">
            @yield('titre_contenu')
        </div>
        <div class="contenu">
            @yield('contenu')
        </div>
        <div class="pied_page">@yield('pied_page')</div>
    </div>
</body>

</html>
