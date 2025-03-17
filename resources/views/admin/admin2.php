

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Style de la barre latérale */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
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
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        /* Cacher la barre latérale pour les petits écrans */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                width: 100%;
                height: auto;
                top: 50px;
                left: -100%; /* Masquée par défaut */
            }

            .sidebar.active {
                left: 0; /* Affiche la barre latérale */
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Bouton pour afficher/cacher la barre latérale */
        .toggle-sidebar {
            font-size: 24px;
            cursor: pointer;
            color: #fff;
            background-color: transparent;
            border: none;
        }

        /* Style de l'en-tête */
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
        }

        /* Statistiques */
        .stats-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .stats-card .card {
            flex: 0 0 calc(100% - 20px); /* 100% pour petits écrans */
            margin: 10px 0;
        }

        @media (min-width: 768px) {
            .stats-card .card {
                flex: 0 0 30%; /* 3 cartes par ligne pour écrans moyens */
            }
        }

        /* Style pour le body */
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Barre latérale -->
        <div class="sidebar">
            <h3 style="font-size:20px; color:white; background-color: #2980f9; height: 50px; margin-top:-14px; padding-top:10px; padding-left:13px;">
                Menu Administrateur
            </h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="{{ route('dossiers_electoraux.index') }}" class="nav-link"><i class="fas fa-clipboard-list"></i> Candidatures</a></li>
                <li class="nav-item"><a href="{{ route('entreprises.index') }}" class="nav-link"><i class="fas fa-building"></i> Entreprises</a></li>
                <li class="nav-item"><a href="{{ route('responsables.index') }}" class="nav-link"><i class="fas fa-user-tie"></i> Responsables</a></li>
                <li class="nav-item"><a href="{{ route('secteurs.index') }}" class="nav-link"><i class="fas fa-industry"></i> Secteurs</a></li>
                <li class="nav-item"><a href="{{ route('sections.index') }}" class="nav-link"><i class="fas fa-th-list"></i> Sections</a></li>
                <li class="nav-item"><a href="{{ route('lieux_inscription.index') }}" class="nav-link"><i class="fas fa-map-marker-alt"></i> Lieux</a></li>
            </ul>
        </div>

        <!-- Contenu principal -->
        <div class="main-content">
            <!-- En-tête -->
            <div class="header">
                <button class="toggle-sidebar" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h3>Tableau de Bord Administrateur</h3>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Profil
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Mon Profil</a></li>
                        <li><a class="dropdown-item" href="#">Les Utilisateurs</a></li>
                        <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                    </ul>
                </div>
            </div>

            <!-- Statistiques des candidatures -->
            <div class="stats-card mt-5">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-check-circle"></i>
                        <h5 class="card-title">Candidatures Validées</h5>
                        <p class="card-text">{{ $validCandidatures }} Candidatures</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-clock"></i>
                        <h5 class="card-title">Candidatures en Attente</h5>
                        <p class="card-text">{{ $pendingCandidatures }} Candidatures</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-times-circle"></i>
                        <h5 class="card-title">Candidatures Rejetées</h5>
                        <p class="card-text">{{ $rejectedCandidatures }} Candidatures</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour gérer la barre latérale -->
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
