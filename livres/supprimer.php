<?php

require_once '../config/Database.php';
require_once '../classes/Livre.php';

$database = new Database();
$db = $database->getConnection();

$livre = new Livre($db);

$livre->id = $_GET['id'];

if($livre->supprimer()){

    header("Location:index.php");
}
?>