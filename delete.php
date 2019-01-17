<?php
include ("connexion.php"); //connexion bdd
// démarre la session
//session_start (); (déjà rajouté dans le fichier "connexion.php")
include ("protection.php"); //vérification de connexion
/* ***************************************************************** */

/**** Supprimer une randonnée ****/

if (!empty($_GET['id']))
{
   /*

    if ($id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) )
    {
        //echo "Oh le méchant pirate...";
        header("location:Danger.html");
    }
   */

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = "DELETE FROM `hiking` WHERE `id` = $id";
    $conn->query($sql);

   header("Location:read.php"); //revenir sans le voir à la page read.php
}