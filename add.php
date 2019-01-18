<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vos mangas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
</head>

<body>
    <!-- action : la page qui traitera mon formulaire -->
    <form action="save.php" method="post">
        <label for="titreMangas">Titre du mangas</label>
        <input class="form-control" type="text" name="titre" id="titreMangas" required>

        <label for="editeurMangas">editeur</label>
        <input class="form-control" type="text" name="editeur" id="editeurMangas">

        <label for="auteurMangas">Le mangaka</label>
        <input class="form-control" type="text" name="auteur" id="auteurMangas" required>

        <label for="genreMangas">Le genre</label>
        <input class="form-control" type="text" name="genre" id="genreMangas">

        <label for="typeMangas">Le type</label>
        <select class="form-control" name="type" id="typeMangas" required>
            <option disabled selected> veuillez-choisir le type du mangas...</option>
            <option value="shonen">shonen</option>
            <option value="seinen">seinen</option>
            <option value="shojo">shojo</option>
        </select>
        <label for="parutionMangas">Date de parution</label>
        <input class="form-control" type="number" name="parution" id="parutionMangas" min="1970" max="2069">
        <button class="btn btn-success" type="submit">Ajouter</button>
    </form>

</body>

</html>