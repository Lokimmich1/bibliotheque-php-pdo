<?php

require_once 'config/Database.php';

$database = new Database();
$db = $database->getConnection();

$auteurs = $db->query("SELECT COUNT(*) as total FROM auteurs")->fetch(PDO::FETCH_ASSOC);

$categories = $db->query("SELECT COUNT(*) as total FROM categories")->fetch(PDO::FETCH_ASSOC);

$livres = $db->query("SELECT COUNT(*) as total FROM livres")->fetch(PDO::FETCH_ASSOC);

$emprunts = $db->query("SELECT COUNT(*) as total FROM emprunts")->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

<title>Gestion Bibliothèque</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<div class="container">

<h1>📚 Gestion de Bibliothèque</h1>

<div class="menu">

<a class="btn home" href="auteurs/index.php">
Auteurs
</a>

<a class="btn home" href="categories/index.php">
Catégories
</a>

<a class="btn home" href="livres/index.php">
Livres
</a>

<a class="btn home" href="emprunts/index.php">
Emprunts
</a>

</div>

<div class="dashboard">

<div class="card">

<h2><?= $auteurs['total'] ?></h2>

<p>Auteurs</p>

</div>

<div class="card">

<h2><?= $categories['total'] ?></h2>

<p>Catégories</p>

</div>

<div class="card">

<h2><?= $livres['total'] ?></h2>

<p>Livres</p>

</div>

<div class="card">

<h2><?= $emprunts['total'] ?></h2>

<p>Emprunts</p>

</div>

</div>

</div>

</body>
</html>