<?php
include ("connexion.php"); //connexion bdd
/* ***************************************************************** */

/**** Supprimer une randonnée ****/

if (!empty($_GET['id']))
{
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM `hiking` WHERE `id` = $id";
    $conn->query($sql);

    header("Location:read.php"); //revenir sans le voir à la page read.php
}