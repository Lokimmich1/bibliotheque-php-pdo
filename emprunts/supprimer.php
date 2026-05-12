<?php

require_once '../config/Database.php';
require_once '../classes/Emprunt.php';

$database = new Database();
$db = $database->getConnection();

$emprunt = new Emprunt($db);

$emprunt->id = $_GET['id'];

if($emprunt->supprimer()){

    header("Location:index.php");
}
?>