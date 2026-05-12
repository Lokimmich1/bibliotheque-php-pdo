<?php

require_once '../config/Database.php';
require_once '../classes/Livre.php';

$database = new Database();
$db = $database->getConnection();

$livre = new Livre($db);

$stmt = $livre->lire();

?>

<!DOCTYPE html>
<html>

<head>

<title>Livres</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Liste des livres</h1>

<a class="btn add" href="ajouter.php">
Ajouter
</a>

<a class="btn back-btn" href="../index.php">
Accueil
</a>

<table>

<tr>

<th>ID</th>
<th>Titre</th>
<th>ISBN</th>
<th>Année</th>
<th>Quantité</th>
<th>Auteur</th>
<th>Catégorie</th>
<th>Actions</th>

</tr>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['titre'] ?></td>
<td><?= $row['isbn'] ?></td>
<td><?= $row['annee'] ?></td>
<td><?= $row['quantite'] ?></td>
<td><?= $row['auteur'] ?></td>
<td><?= $row['categorie'] ?></td>

<td class="actions">

<a class="btn edit"
href="modifier.php?id=<?= $row['id'] ?>">

Modifier

</a>

<a class="btn delete"
href="supprimer.php?id=<?= $row['id'] ?>"
onclick="return confirm('Voulez-vous supprimer ce livre ?')">

Supprimer

</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>