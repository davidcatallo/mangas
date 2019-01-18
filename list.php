<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

<?php


$host       = 'localhost'; 
$dbname     = 'cours_php';
$port       = '3308'; 
$login      = 'root';
$password   = ''; 

/**
 * Je me connecte à la base de données
 */

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);
}
catch (Exception $e) {
    
    die('Erreur : ' . $e->getMessage());
}

 $request = 'SELECT * FROM mangas';

 $response = $bdd->query($request);

 $mangas = [];

while($donnees = $response->fetch() ) {
                // Je met ma ligne ($donnees) dans mon tableau $shoes
                $mangas[] = $donnees;
            }

?>

    <table class="table">

        <tr>
            <th>Titre</th>
            <th>editeur</th>
            <th>auteur</th>
            <th>type</th>
            <th>genre</th>
            <th>parution</th>
        </tr>
        <?php foreach($mangas as $m) { ?>
        <tr>
            <td>
                <?= $m['titre']; ?>
            </td>
            <td>
                <?= $m['editeur']; ?>
            </td>
            <td>
                <?= $m['auteur']; ?>
            </td>
            <!-- Ici, j'utilise "date()" pour forcer l'affichage en Y (year) -->
            <!-- J'utilise aussi strtotime() pour passer en argument à date le TIMESTAMP de la date de sortie -->

            <td>
                <?= $m['type']; ?>
            </td>
            <td>
                <?= $m['genre']; ?>
            </td>
            <td>
                <?= date('Y', strtotime($m['parution'])); ?>
            </td>
            <td>
                <a href="show.php?manga=<?= $m['id']; ?>" class="btn btn-primary">Voir</a>
                <a href="delete.php?manga=<?= $m['id']; ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
        <?php } ?>

    </table>

</body>

</html>