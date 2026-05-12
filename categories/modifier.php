<?php

require_once '../config/Database.php';
require_once '../classes/Categorie.php';

$database = new Database();
$db = $database->getConnection();

$categorie = new Categorie($db);

$categorie->id = $_GET['id'];

$categorie->lireUn();

if($_POST){

    $categorie->libelle = $_POST['libelle'];

    if($categorie->modifier()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Modifier Catégorie</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Modifier Catégorie</h1>

<form method="POST">

<input type="text"
name="libelle"
value="<?= $categorie->libelle ?>">

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