<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de Bord Administrateur')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Votre propre CSS si nécessaire -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Style pour la barre latérale */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 250;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 80px;
            transition: all 0.3s ease;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            text-decoration: none;
            display: block;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
            font-size: 20px;
        }

        .sidebar .nav-item {
                 position: relative;
        }

        .sidebar .nav-link {
            margin-top: 350;

            padding-left: 40px;
        }

        /* Style pour l'icône de recherche dans la barre latérale */
        .sidebar .search-input {
            width: 80%;
            padding: 5px;
            margin: 0 auto;
            border-radius: 20px;
            border: none;
            margin-bottom: 20px;
        }

        /* Icone de recherche */
        .sidebar .search-input::placeholder {
            color: #aaa;
        }

        .main-content {
            margin-left: 245px;
            padding: 20px;
            margin-top: 55px;
            transition: all 0.3s ease;
        }

        /* Nouveau style pour l'en-tête personnalisé */
        /* .header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        } */
        .header {
            background-color: #2980B9;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align:center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h3 {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            text-align:center;
            float:left;
        }

        .header .user-options {
            display: flex;
            align-items: center;
        }

        .header .user-options .dropdown {
            margin-left: 15px;
        }


        /* Statistiques des candidatures (icônes) */
        .stats-card {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .stats-card .card {
            width: 18rem;
            margin: 10px;
            text-align: center;
        }

        .stats-card .card i {
            font-size: 3rem;
            color: #007bff;
        }

        .card-body {
            background-color: #f8f9fa;
        }

        .card-footer {
            background-color: #e9ecef;
            border-top: 1px solid #ccc;
        }

        /* Ajout d'un fond au body */
        body {
            background-color: #f8f9fa;
        }

        .dropdown-menu {
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #3498DB;
            color: #fff;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Barre latérale -->
        <div class="sidebar">
        
            <!-- Champ de recherche dans la barre latérale -->
            <h3 style="font-size:20px; color:white; background-color: #2980f9; top:0px; height: 50px; margin-top:-14px; padding-top:10px; padding-left:13px;"> Menu Administrateur</h3>

            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('dossiers_electoraux.index') }}" class="nav-link"><i class="fas fa-clipboard-list"></i> Candidatures</a></li>
                <li class="nav-item"><a href="{{ route('entreprises.index') }}" class="nav-link"><i class="fas fa-building"></i> Entreprises</a></li>
                <li class="nav-item"><a href="{{ route('responsables.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> Responsables</a></li>
                <li class="nav-item"><a href="{{ route('secteurs.index') }}" class="nav-link"><i class="fas fa-industry"></i> Secteurs d'activités</a></li>
                <li class="nav-item"><a href="{{ route('sections.index') }}" class="nav-link"><i class="fas fa-th-list"></i> Sections</a></li>
                <li class="nav-item"><a href="{{ route('lieux_inscription.index') }}" class="nav-link"><i class="fas fa-map-marker-alt"></i> Lieux d'enregistrement</a></li>
            </ul>

            
        </div>
        <div class="header">
                <h3>Tableau de Bord Administrateur</h3>
                <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Profil
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                            <li><a class="dropdown-item" href="#">Les Utilisateurs</a></li>
                            <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                            <!-- Icône Administrateur -->
                            <li><a href="{{ route('admin') }}" title="Zone Administrateur" class="dropdown-item">Administrateur </a></li>
                        </ul>
                    </div>
            </div>
        <!-- Contenu principal -->
        <div class="main-content">
            <!-- Nouveau en-tête personnalisé -->
            

            <!-- Statistiques des candidatures -->
            <div class="stats-card">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-check-circle"></i>
                        <h5 class="card-title">Candidatures Validées</h5>
                        <p class="card-text">{{ $validCandidatures }} Candidatures</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('candidatures.validees') }}" class="btn btn-success">Voir Liste</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-clock"></i>
                        <h5 class="card-title">Candidatures en Attente</h5>
                        <p class="card-text">{{ $pendingCandidatures }} Candidatures</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('candidatures.en_attente') }}" class="btn btn-warning">Voir Liste</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-times-circle"></i>
                        <h5 class="card-title">Candidatures Rejetées</h5>
                        <p class="card-text">{{ $rejectedCandidatures }} Candidatures</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('candidatures.rejetees') }}" class="btn btn-danger">Voir Liste</a>
                    </div>
                </div>

               
            </div>
            <div class="card">
                    <div class="card-body" style="display:block, align:center" >
                        <i class="fas fa-file-all"></i>
                        <h5 class="card-title">Candidatures tolales</h5>
                        <p class="card-text">{{ $totalDossiers }} Candidatures</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('dossiers_electoraux.index') }}" style="width:100%" class="btn btn-primary">Voir Liste</a>
                    </div>
                </div>
            <!-- Contenu principal -->
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
