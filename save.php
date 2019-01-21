<?php
/**
 * Je vérifie que mes données soient bien transmises
 */

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

/**
 * Validations
 */

if (empty($_POST['titre'])) {
    echo "Attention, le titre ne peut pas être vide.<br>";
}
elseif( strlen($_POST['titre']) > 70 ) {
    echo "Attention, le titre ne peut pas être plus grand que 70 caractères.<br>";
}
else {
    $titre = $_POST['titre'];
}



if (empty($_POST['editeur'])) {
    $editeur = null;
}
elseif( strlen($_POST['editeur']) > 45 ) {
    echo "Attention, le champ éditeur dois prendre moins de 45 caractères.<br>";
}
else {
    $editeur = $_POST['editeur'];
}


if (empty($_POST['auteur'])) {
    echo "Attention, l'auteur ne peut pas être vide.<br>";
}
elseif(strlen($_POST['auteur']) > 45 ) {
    echo "Attention, l'auteur ne peut pas être plus grand que 70 caractères.<br>";
}
else {
    $auteur = $_POST['auteur'];
}


if (empty($_POST['genre'])) {
    $genre = null;
}
elseif(strlen($_POST['genre']) > 45 ) {
    echo "Attention, le genre ne peut pas être plus grand que 45 caractères.<br>";
}
elseif (is_numeric($_POST['genre'])) {
   echo "Attention, le genre ne dois pas contenir de nombres!<br>";
}
else {
    $genre = $_POST['genre'];
}


if (empty($_POST['type'])) {
    echo "Attention, vous devez selectionné un type.<br>";
}
elseif( strlen($_POST['type']) > 6 ) {
    echo "Attention, le type ne peut pas être plus grand que 6 caractères.<br>";
}
else {
    $type = $_POST['type'];
}

if (empty($_POST['parution'])) {
    $parution = null;
}
elseif(intval($_POST['parution']) == 0) {
    echo "Attention, la date de parution est composé uniquement de nombres <br>";
}
elseif ($_POST['parution'] < 1970 || $_POST['parution'] > 2070) {
    echo "Attention, la date de parution dois être comprise entre 1970 et 2070!<br>";
}
else {
    $parution = $_POST['parution'];
}

// Deuxieme validation de l'existence des variable requises
if (empty($type) || empty($auteur) || empty($titre) ) {
    echo "Attention, le titre, l'auteur et le type sont obligatoires !";
}
// ajout des valeurs du formulaire sur la table mangas
else {
    $req = "INSERT INTO mangas(titre, editeur, auteur, genre , type, parution)
            VALUES(:titre, :editeur, :auteur, :genre, :type, :parution)";
    $res = $bdd->prepare($req);
    $res->execute([
        'titre' => $titre,
        'editeur' => $editeur,
        'auteur' => $auteur,
        'genre' => $genre,
        'type' => $type,
        'parution' => $parution,
    ]);   

    echo "<a href='list.php'>afficher ma liste</a><br><br>";
    echo "<a href='add.php'>ajouter un nouveau mangas !</a>";
}


