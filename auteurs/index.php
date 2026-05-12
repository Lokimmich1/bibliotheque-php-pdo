<?php

require_once '../config/Database.php';
require_once '../classes/Auteur.php';

$database = new Database();
$db = $database->getConnection();

$auteur = new Auteur($db);

$stmt = $auteur->lire();

?>

<!DOCTYPE html>
<html>

<head>

<title>Auteurs</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Liste des auteurs</h1>

<a class="btn add" href="ajouter.php">
Ajouter
</a>

<a class="btn back-btn" href="../index.php">
Accueil
</a>

<table>

<tr>

<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Nationalité</th>
<th>Actions</th>

</tr>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['nom'] ?></td>
<td><?= $row['prenom'] ?></td>
<td><?= $row['nationalite'] ?></td>

<td class="actions">

<a class="btn edit"
href="modifier.php?id=<?= $row['id'] ?>">

Modifier

</a>

<a class="btn delete"
href="supprimer.php?id=<?= $row['id'] ?>"
onclick="return confirm('Voulez-vous supprimer cet auteur ?')">

Supprimer

</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>