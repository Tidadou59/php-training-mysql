<?php
include ("connexion.php"); //connexion bdd
/* ***************************************************************** */

$sql = "select * from hiking";
$resultat = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <center>
    <table class="table">
      <!-- Afficher la liste des randonnées -->

        <tr class="styl">
            <th class="taille_Prenom-Nom"> Name </th>
            <th class="taille_Prenom-Nom"> Difficulté </th>
            <th class="taille_Prenom-Nom"> Distance </th>
            <th class="taille_Prenom-Nom"> Durée </th>
            <th class="taille_Prenom-Nom"> Dénivelé </th>

            <th class="taille_Age"> Modifier </th>
            <th class="taille_Age"> Supprimer </th>
        </tr>

        <?php
        while($row = $resultat->fetch_assoc())
        {
            ?>
            <tr class="tr_genere souris">
                <td class="T_id souriss"><?= $row['name'] ?></td> <!-- Name -->
                <td class='T_P'><?= $row['difficulty'] ?></td> <!-- Difficulté -->
                <td class='T_N'><?= $row['distance'] ?></td> <!-- Durée -->
                <td class='T_A'><?= $row['duration'] ?></td> <!-- Dénivelé -->
                <td class='T_A'><?= $row['height_difference'] ?></td> <!-- Dénivelé -->

                <td class='T_A'>
                    <a href=" <?= 'update.php?id='.$row['id'] ?> ">
                        <img class="imgModif" src="ico-modifier.jpg" height="50" width="50" >
                    </a>
                </td> <!-- Modif -->
                
                <td class='T_A'> 
                    <a href=" <?= 'delete.php?id='.$row['id'] ?> ">
                        <img class="imgModif" src="ico-suppr.jpg" height="50" width="50" >
                    </a>
                </td> <!-- Modif -->
            </tr>
       <?php } ?>



    </table>
    </center>
<br>
    Ajouter une nouvelle donnée :<br>
    <a href="create.php">
            <img src="plus.png" height="30" width="30" >
    </a>


  </body>
</html>