<?php

require_once '../config/Database.php';
require_once '../classes/Livre.php';

$database = new Database();

$db = $database->getConnection();

$livre = new Livre($db);

$livre->id = $_GET['id'];

$livre->lireUn();

$auteurs = $db->query("SELECT * FROM auteurs");
$categories = $db->query("SELECT * FROM categories");

if($_POST){

    $livre->titre = $_POST['titre'];
    $livre->isbn = $_POST['isbn'];
    $livre->annee = $_POST['annee'];
    $livre->quantite = $_POST['quantite'];
    $livre->auteur_id = $_POST['auteur_id'];
    $livre->categorie_id = $_POST['categorie_id'];

    if($livre->modifier()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Modifier Livre</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Modifier Livre</h1>

<form method="POST">

<input type="text" name="titre" value="<?= $livre->titre ?>">

<input type="text" name="isbn" value="<?= $livre->isbn ?>">

<input type="number" name="annee" value="<?= $livre->annee ?>">

<input type="number" name="quantite" value="<?= $livre->quantite ?>">

<select name="auteur_id">

<?php while($auteur = $auteurs->fetch(PDO::FETCH_ASSOC)) : ?>

<option value="<?= $auteur['id'] ?>"
<?= $livre->auteur_id == $auteur['id'] ? 'selected' : '' ?>>

<?= $auteur['nom'] ?>

</option>

<?php endwhile; ?>

</select>

<select name="categorie_id">

<?php while($categorie = $categories->fetch(PDO::FETCH_ASSOC)) : ?>

<option value="<?= $categorie['id'] ?>"
<?= $livre->categorie_id == $categorie['id'] ? 'selected' : '' ?>>

<?= $categorie['libelle'] ?>

</option>

<?php endwhile; ?>

</select>

<button type="submit">Modifier</button>

</form>

</div>

</body>
</html>