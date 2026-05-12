<?php

require_once '../config/Database.php';
require_once '../classes/Auteur.php';

$database = new Database();
$db = $database->getConnection();

$auteur = new Auteur($db);

if($_POST){

    $auteur->nom = $_POST['nom'];
    $auteur->prenom = $_POST['prenom'];
    $auteur->nationalite = $_POST['nationalite'];

    if($auteur->ajouter()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Ajouter Auteur</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Ajouter un auteur</h1>

<form method="POST">

<input type="text"
name="nom"
placeholder="Nom"
required>

<input type="text"
name="prenom"
placeholder="Prénom"
required>

<input type="text"
name="nationalite"
placeholder="Nationalité"
required>

<button type="submit">

Ajouter

</button>

<a class="btn back-btn" href="index.php">

Retour

</a>

</form>

</div>

</body>
</html>