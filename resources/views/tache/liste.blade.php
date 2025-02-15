<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des tâches</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    <script src="{{ asset('../js/script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</head>
<body>
    @if(session('success'))
        <p style="color: green; font-size: 20px; font-weight: bold;">{{ session('success') }}<p>
    @endif

    @if(session('error'))
        <p style="color: red; font-size: 20px; font-weight: bold;">{{ session('error') }}<p>
    @endif
    <br> <br>

    <h1>Création de tâche</h1>
    <form id="taskForm" method="POST" action="{{ route('tache.save') }}">
        @csrf
        <input type="text" name="titre" placeholder="Nom de la tâche" required>
        <input type="text" name="description" placeholder="Description de la tâche" required>
        <br><br>
        <input type="submit" name="submit" value="Créer">
    </form>
    <br><br>
    <h1>Liste des tâches</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>État</th>
            <th>Supprimer</th>
            <th>Modifier</th>
            <th>Terminer</th>
            <th>Date de création</th>
            <th>Date de modification</th>
        </tr>
        @foreach($taches as $tache)
            <tr>
                <td>{{ $tache->nomTache }}</td>
                <td>{{ $tache->descriptionTache }}</td>
                <td>Non disponible</td>
                <td><a href="{{ route('tache.supprimer', ['idTache' => $tache->idTache]) }}" class="delete">Supprimer</a></td>
                <td><a href="{{ route('tache.modifier', ['idTache' => $tache->idTache]) }}" class="edit">Modifier</a></td>
                <td><a href="" class="complete">Non disponible</a></td>
                <td>{{ $tache->created_at }}</td>
                <td>{{ $tache->updated_at }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
