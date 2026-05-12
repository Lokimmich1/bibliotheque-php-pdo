<?php

require_once '../config/Database.php';
require_once '../classes/Emprunt.php';

$database = new Database();
$db = $database->getConnection();

$emprunt = new Emprunt($db);

$livres = $db->query("SELECT * FROM livres");

if($_POST){

    $emprunt->livre_id = $_POST['livre_id'];
    $emprunt->nom_emprunteur = $_POST['nom_emprunteur'];
    $emprunt->date_emprunt = $_POST['date_emprunt'];
    $emprunt->date_retour = $_POST['date_retour'];
    $emprunt->statut = $_POST['statut'];

    if($emprunt->ajouter()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Ajouter Emprunt</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Ajouter Emprunt</h1>

<form method="POST">

<select name="livre_id">

<?php while($livre = $livres->fetch(PDO::FETCH_ASSOC)) : ?>

<option value="<?= $livre['id'] ?>">

<?= $livre['titre'] ?>

</option>

<?php endwhile; ?>

</select>

<input type="text"
name="nom_emprunteur"
placeholder="Nom emprunteur"
required>

<input type="date"
name="date_emprunt"
required>

<input type="date"
name="date_retour"
required>

<select name="statut">

<option value="En cours">
En cours
</option>

<option value="Retourné">
Retourné
</option>

</select>

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