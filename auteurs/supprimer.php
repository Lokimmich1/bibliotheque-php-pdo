<?php

require_once '../config/Database.php';
require_once '../classes/Auteur.php';

$database = new Database();
$db = $database->getConnection();

$auteur = new Auteur($db);

$auteur->id = $_GET['id'];

if($auteur->supprimer()){

    header("Location:index.php");
}
?>