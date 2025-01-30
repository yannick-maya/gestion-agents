<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion des Entreprises')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Votre propre CSS si nécessaire -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Style pour la barre latérale */
        .search-input {
            border-radius: 30px;
            padding: 8px;
            border: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #3498DB;  /* Un bleu vif */
            border: none;
        }

        .btn-primary:hover {
            background-color: #2980B9;  /* Bleu plus foncé pour l'effet hover */
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2C3E50;  /* Une nuance plus moderne du bleu foncé */
            padding-top: 20px;
            transition: all 0.3s ease;
        }

        .sidebar a.active {
            background-color: #3498DB;
            color: #fff;
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
            background-color: #3498DB;
            color: white;
            font-size: 20px;
        }

        .sidebar .nav-item {
            position: relative;
        }

        .sidebar .nav-link {
            padding-left: 40px;
        }

        /* Style pour l'icône de recherche dans la barre latérale */
        .search-input {
            width: 80%;
            padding: 5px;
            margin: 0 auto;
            border-radius: 20px;
            border: none;
            margin-bottom: 20px;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .formulaire-bg {
            background-color: #f8f9f2;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
            margin-left:100px;
        }

        .main-content {
            top: 30px;
            margin-left: 250px;
            padding: 40px 10px 30px 10px;
            transition: all 0.3s ease;
        }

        /* Nouveau style pour l'en-tête personnalisé */
        .header {
            background-color: #2980B9;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        }

        .header .user-options {
            display: flex;
            align-items: center;
        }

        .header .user-options .dropdown {
            margin-left: 15px;
        }

        .admin-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            color: #fff;
            background-color: #dc3545;
            padding: 10px;
            border-radius: 50%;
        }

        /* Responsivité */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .main-content {
                margin-left: 0;
                padding-top: 70px; /* Ajout de l'espace pour l'en-tête */
            }

            .header {
                flex-direction: column;
                text-align: center;
                padding: 10px;
            }

            .header h3 {
                font-size: 20px;
            }

            .search-input {
                width: 100%;
                margin-bottom: 15px;
            }

            .sidebar a {
                font-size: 16px;
            }
        }

        /* Ajout d'un fond au body */
        body {
            background-color: #ECF0F1;
            font-family: 'Roboto', sans-serif;
        }

        .dropdown-menu {
            border-radius: 5px;
            background-color: #ECF0F1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #000;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #3498DB;
            color: #fff;
        }
    </style>
</head>
<body>
     <!-- Nouveau en-tête personnalisé -->
     <div class="header">
                <h3>Tableau de Bord</h3>
                <div class="user-options">
                     <!-- Champ de recherche dans la barre latérale -->
                     <form method="GET" action="{{ route('dossiers_electoraux.search') }}" class="d-flex">
                     <input type="text" name="keyword" class="form-control" placeholder="Rechercher un dossier..." value="{{ request('keyword') }}">
                     <button type="submit" class="btn btn-primary ms-2">Rechercher</button>
</form>

                    <!-- Vous pouvez ajouter des liens ou un menu déroulant ici -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> Profil
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                            <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                            <!-- Icône Administrateur -->
                            <li><a href="{{ route('admin') }}" title="Zone Administrateur" class="dropdown-item">Administrateur </a></li>
                        </ul>
                    </div>
                </div>
            </div>

    <div class="d-flex">
        <!-- Barre latérale -->
        <div class="sidebar">
            <h3 class="text-white text-center">Gestion Agents</h3>

           

            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('dossiers_electoraux.index') }}" class="nav-link"><i class="fas fa-clipboard-list"></i> Candidatures</a></li>
                <li class="nav-item"><a href="{{ route('entreprises.index') }}" class="nav-link"><i class="fas fa-building"></i> Entreprises</a></li>
                <li class="nav-item"><a href="{{ route('responsables.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> Responsables</a></li>
                <li class="nav-item"><a href="{{ route('secteurs.index') }}" class="nav-link"><i class="fas fa-check"></i> Verifier les candidatures</a></li>
                <li class="nav-item"><a href="{{ route('sections.index') }}" class="nav-link"><i class="fas fa-th-list"></i> Rapport des candidatures</a></li>
                <li class="nav-item"><a href="{{ route('lieux_inscription.index') }}" class="nav-link"><i class="fas fa-print"></i> Importer des donnees</a></li>
            </ul>

           
                <i class="fas fa-cogs"></i>
            </a>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
           
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
