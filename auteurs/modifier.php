<?php

require_once '../config/Database.php';
require_once '../classes/Auteur.php';

$database = new Database();
$db = $database->getConnection();

$auteur = new Auteur($db);

$auteur->id = $_GET['id'];

$auteur->lireUn();

if($_POST){

    $auteur->nom = $_POST['nom'];
    $auteur->prenom = $_POST['prenom'];
    $auteur->nationalite = $_POST['nationalite'];

    if($auteur->modifier()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Modifier Auteur</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Modifier Auteur</h1>

<form method="POST">

<input type="text"
name="nom"
value="<?= $auteur->nom ?>">

<input type="text"
name="prenom"
value="<?= $auteur->prenom ?>">

<input type="text"
name="nationalite"
value="<?= $auteur->nationalite ?>">

<button type="submit">

Modifier

</button>

<a class="btn back-btn" href="index.php">

Retour

</a>

</form>

</div>

</body>
</html>