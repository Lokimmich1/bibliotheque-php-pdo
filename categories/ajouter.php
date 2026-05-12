<?php

require_once '../config/Database.php';
require_once '../classes/Categorie.php';

$database = new Database();
$db = $database->getConnection();

$categorie = new Categorie($db);

if($_POST){

    $categorie->libelle = $_POST['libelle'];

    if($categorie->ajouter()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Ajouter Catégorie</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Ajouter une catégorie</h1>

<form method="POST">

<input type="text"
name="libelle"
placeholder="Libellé"
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