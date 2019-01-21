<?php

$host       = 'localhost'; 
$dbname     = 'cours_php'; 
$port       = '3308'; 
$login      = 'root'; 
$password   = '';
try {
    // Essaie de faire ce script...
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8;port='.$port, $login, $password);
}
catch (Exception $e) {
    // Sinon, capture l'erreur et affiche la
    die('Erreur : ' . $e->getMessage());
}

$requete = "SELECT * FROM mangas WHERE id = " . $_GET['manga'];
$res = $bdd->query($requete);
$mangas = $res->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $mangas['titre'] ?> (<?= date('Y', strtotime($mangas['parution']));?>)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
    
    <div class="container" style="background-color: rgba(255, 255, 255, 0.3)">
        <div class="row">
            <div class="col-12 d-flex d-inline">

            <h2><?= $mangas['titre']; ?></h2><p> ( paru en <?=date('Y', strtotime($mangas['parution']));?>)</p>
            </div>
            <div class="col-12">
            <small>ecrit par <?= $mangas['auteur']; ?> .</small>

            <hr>
                <a href="list.php">Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>