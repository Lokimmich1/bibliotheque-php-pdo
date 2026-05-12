<?php

require_once '../config/Database.php';
require_once '../classes/Emprunt.php';

$database = new Database();
$db = $database->getConnection();

$emprunt = new Emprunt($db);

$stmt = $emprunt->lire();

?>

<!DOCTYPE html>
<html>

<head>

<title>Emprunts</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Liste des emprunts</h1>

<a class="btn add" href="ajouter.php">
Ajouter
</a>

<a class="btn back-btn" href="../index.php">
Accueil
</a>

<table>

<tr>

<th>ID</th>
<th>Livre</th>
<th>Emprunteur</th>
<th>Date Emprunt</th>
<th>Date Retour</th>
<th>Statut</th>
<th>Actions</th>

</tr>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

<tr>

<td><?= $row['id'] ?></td>
<td><?= $row['livre'] ?></td>
<td><?= $row['nom_emprunteur'] ?></td>
<td><?= $row['date_emprunt'] ?></td>
<td><?= $row['date_retour'] ?></td>
<td><?= $row['statut'] ?></td>

<td>

<a class="btn delete"
href="supprimer.php?id=<?= $row['id'] ?>"
onclick="return confirm('Voulez-vous supprimer cet emprunt ?')">

Supprimer

</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>