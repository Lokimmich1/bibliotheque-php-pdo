<?php

require_once '../config/Database.php';
require_once '../classes/Categorie.php';

$database = new Database();
$db = $database->getConnection();

$categorie = new Categorie($db);

$categorie->id = $_GET['id'];

if($categorie->supprimer()){

    header("Location:index.php");
}
?>