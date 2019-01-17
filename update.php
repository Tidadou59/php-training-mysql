<?php
include ("connexion.php"); //connexion bdd
// démarre la session
//session_start (); (déjà rajouté dans le fichier "connexion.php")
include ("protection.php"); //vérification de connexion
/* ***************************************************************** */

$id = $_GET['id']; // récupere l'id dans l'url
$sql = "select * from hiking WHERE id=$id"; // selectionne la table et l'id via l'url
$resultat = $conn->query($sql); //execution de la requete
$donnee = $resultat->fetch_assoc(); //stock les données recupéré pour les utilisés

/**** Modifier une randonnée ****/
if (isset($_POST['name']))
    {
        modifier();
    }

function modifier ()
{
    global $conn;

    $stmt = $conn->prepare("UPDATE hiking
                                    SET
                                    name = ?,
                                    difficulty = ?,
                                    distance = ?,
                                    duration = ?,
                                    height_difference = ?
                                    WHERE id = ?");

    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];
    $id = $_GET['id'];



    $stmt->bind_param('ssiiii',
        $name,
        $difficulty,
        $distance,
        $duration,
        $height_difference,
        $id);
    $stmt->execute();
    $stmt->close();

    // afficher un message
    echo "données envoyé... <br><br>";
    header('Location: read.php'); //revenir sans le voir à la page read.php


}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajouter une randonnée</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <a href="read.php">Liste des données</a>
    <h1>Modifier une info</h1>
    <form action="" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?= $donnee['name'] ?>" required>
        </div>

        <div>
            <label for="difficulty">Difficulté</label>
            <select name="difficulty">
                <option value="Tfacile" <?php if ($donnee['difficulty'] == 'Tfacile'){echo "selected";} ?> >Très facile</option>
                <option value="facile" <?php if ($donnee['difficulty'] == 'facile'){echo "selected";} ?> >Facile</option>
                <option value="moyen" <?php if ($donnee['difficulty'] == 'moyen'){echo "selected";} ?> >Moyen</option>
                <option value="difficile" <?php if ($donnee['difficulty'] == 'difficile'){echo "selected";} ?> >Difficile</option>
                <option value="Tdifficile" <?php if ($donnee['difficulty'] == 'Tdifficile'){echo "selected";} ?> >Très difficile</option>
            </select>
        </div>

        <div>
            <label for="distance">Distance</label>
            <input type="text" name="distance" value="<?= $donnee['distance'] ?>">
        </div>
        <div>
            <label for="duration">Durée</label>
            <input type="duration" name="duration" value="<?= $donnee['duration'] ?>">
        </div>
        <div>
            <label for="height_difference">Dénivelé</label>
            <input type="text" name="height_difference" value="<?= $donnee['height_difference'] ?>">
        </div>
        <button type="submit" name="button">Envoyer</button>
    </form>
</body>
</html>



