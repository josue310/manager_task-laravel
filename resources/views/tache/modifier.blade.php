<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la tâche</title>
    <link rel="stylesheet" href="styles.css">
    <script src="{{ asset('../js/modifier.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

</head>
<body>
    <div class="container">
        <h1>Modifier la tâche</h1>
        <form method="post" action="{{ route('tache.update', ['idTache' => $tache->idTache]) }}" class="task-form">
            @csrf
            
                {{-- Champ caché pour envoyer l'ID de la tâche --}}
            <input type="hidden" name="idTache" value="{{ $tache->idTache }}">

            <label for="titre">Nom de la tâche :</label>
            <input type="text" name="titre" value="{{ $tache->nomTache }}" required>
            
            <label for="description">Description de la tâche :</label>
            <input type="text" name="description" value="{{ $tache->descriptionTache }}" required>
            
            <button type="submit" name="modifier" class="btn">Modifier</button>
        </form>

        <a href="{{ route('tache.liste') }}" class="back-btn">Retour</a>
    </div>


</body>
</html>
