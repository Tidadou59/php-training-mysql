<?php
include ("connexion.php"); //connexion bdd
/* ***************************************************************** */

/**** Supprimer une randonnée ****/

$id = $_GET['id'];
$conn->query("DELETE FROM `hiking` WHERE `id` = $id");

header("Location:read.php"); //revenir sans le voir à la page read.php