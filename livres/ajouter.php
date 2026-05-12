<?php

require_once '../config/Database.php';
require_once '../classes/Livre.php';

$database = new Database();

$db = $database->getConnection();

$livre = new Livre($db);

$auteurs = $db->query("SELECT * FROM auteurs");
$categories = $db->query("SELECT * FROM categories");

if($_POST){

    $livre->titre = $_POST['titre'];
    $livre->isbn = $_POST['isbn'];
    $livre->annee = $_POST['annee'];
    $livre->quantite = $_POST['quantite'];
    $livre->auteur_id = $_POST['auteur_id'];
    $livre->categorie_id = $_POST['categorie_id'];

    if($livre->ajouter()){

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Ajouter Livre</title>

<link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="container">

<h1>Ajouter Livre</h1>

<form method="POST">

<input type="text" name="titre" placeholder="Titre" required>

<input type="text" name="isbn" placeholder="ISBN" required>

<input type="number" name="annee" placeholder="Année" required>

<input type="number" name="quantite" placeholder="Quantité" required>

<select name="auteur_id">

<?php while($auteur = $auteurs->fetch(PDO::FETCH_ASSOC)) : ?>

<option value="<?= $auteur['id'] ?>">
<?= $auteur['nom'] ?>
</option>

<?php endwhile; ?>

</select>

<select name="categorie_id">

<?php while($categorie = $categories->fetch(PDO::FETCH_ASSOC)) : ?>

<option value="<?= $categorie['id'] ?>">
<?= $categorie['libelle'] ?>
</option>

<?php endwhile; ?>

</select>

<button type="submit">Ajouter</button>

</form>

</div>

</body>
</html>