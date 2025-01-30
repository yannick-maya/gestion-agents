<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Entreprise</title>
</head>
<body>

    <h1>Ajouter une nouvelle entreprise</h1>

    <!-- Formulaire d'ajout d'entreprise -->
    <form action="{{ route('entreprise.store') }}" method="POST">
        @csrf
        
        <!-- Champ Nom de l'entreprise -->
        <label for="nom">Nom de l'entreprise :</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}" required><br><br>

        <!-- Menu déroulant pour les Sections -->
        <label for="section">Section :</label>
        <select name="section" id="section" required>
            <option value="">Sélectionner une section</option>
            @foreach($sections as $section)
                <option value="{{ $section }}" {{ old('section') == $section ? 'selected' : '' }}>{{ $section }}</option>
            @endforeach
        </select><br><br>

        <!-- Menu déroulant pour les Secteurs -->
        <label for="secteur_activite">Secteur d'activité :</label>
        <select name="secteur_activite" id="secteur_activite" required>
            <option value="">Sélectionner un secteur</option>
            @foreach($secteurs as $secteur)
                <option value="{{ $secteur }}" {{ old('secteur_activite') == $secteur ? 'selected' : '' }}>{{ $secteur }}</option>
            @endforeach
        </select><br><br>

        <!-- Menu déroulant pour les Lieux d'inscription -->
        <label for="lieu_inscription">Lieu d'inscription :</label>
        <select name="lieu_inscription" id="lieu_inscription" required>
            <option value="">Sélectionner un lieu d'inscription</option>
            @foreach($lieux_inscription as $lieu)
                <option value="{{ $lieu }}" {{ old('lieu_inscription') == $lieu ? 'selected' : '' }}>{{ $lieu }}</option>
            @endforeach
        </select><br><br>

        <!-- Champ Contact Téléphonique -->
        <label for="contact_telephone">Contact téléphonique :</label>
        <input type="text" name="contact_telephone" id="contact_telephone" value="{{ old('contact_telephone') }}" required><br><br>

        <!-- Champ Email -->
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required><br><br>

        <!-- Champ Date de début d'activité -->
        <label for="date_debut_activite">Date de début d'activité :</label>
        <input type="date" name="date_debut_activite" id="date_debut_activite" value="{{ old('date_debut_activite') }}" required><br><br>

        <!-- Champ RCCM -->
        <label for="rccm">RCCM :</label>
        <input type="text" name="rccm" id="rccm" value="{{ old('rccm') }}" required><br><br>

        <!-- Champ Patente -->
        <label for="patente">Patente payée :</label>
        <input type="checkbox" name="patente" id="patente" {{ old('patente') ? 'checked' : '' }}><br><br>

        <!-- Champ Adhésion à la CCIAMA -->
        <label for="adhesion_cciama">Adhésion à la CCIAMA :</label>
        <input type="checkbox" name="adhesion_cciama" id="adhesion_cciama" {{ old('adhesion_cciama') ? 'checked' : '' }}><br><br>

        <!-- Champ Casier Judiciaire -->
        <label for="casier_judiciaire">Casier judiciaire valide :</label>
        <input type="checkbox" name="casier_judiciaire" id="casier_judiciaire" {{ old('casier_judiciaire') ? 'checked' : '' }}><br><br>

        <!-- Champ NIF -->
        <label for="nif">NIF (Numéro d'identification fiscale) :</label>
        <input type="text" name="nif" id="nif" value="{{ old('nif') }}" required><br><br>

        <!-- Champ Quitus Fiscal -->
        <label for="quitus_fiscal">Quitus fiscal :</label>
        <input type="checkbox" name="quitus_fiscal" id="quitus_fiscal" {{ old('quitus_fiscal') ? 'checked' : '' }}><br><br>

        <!-- Bouton de soumission -->
        <button type="submit">Ajouter l'entreprise</button>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>

</body>
</html>
