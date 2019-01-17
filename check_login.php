<?php
include ("connexion.php"); //connexion bdd
// démarre la session
//session_start (); (déjà rajouté dans le fichier "connexion.php")
/* ***************************************************** */
$username = $_POST['username'];
$password = sha1($_POST['password']); //sha1 = cryptage via phpmyadmin !!!
$sql = "select * from user WHERE username = '$username'";
$resultat = $conn->query($sql);
$utilisateur = $resultat->fetch_assoc();

// force les identifiant :
//$login_valide = "Dav";
//$pwd_valide = "123";

    // test si les variables sont définies
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

    	// vérifie les informations du formulaire, (pseudo & password saisi est bien autorisé)
    	if (isset($utilisateur['username']))
        {
    	    if ($password == $utilisateur['password']) {
                // dans ce cas, tout est ok, on peut démarrer notre session

                // Démarre la session
                session_start();
                // enregistre les paramètres du visiteur comme variables de session
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];

                // redirige le visiteur vers une page de notre section membre
                header('location: read.php');
            }
    	    else
            {
                //echo 'mot de passe non reconnu...<br>redirection automatique dans 5 secondes';

                echo '<br>mot de passe non reconnu...<br><br>redirection automatique dans 5 secondes';

                header( "refresh:3;url=login.php" );
            }
    	}
    	else {
    		// visiteur non reconnu comme étant membre du site.
    		echo '<body onLoad="alert(\'Dsl, Membre non reconnu...\')">';
    		// redirige vers la page login
    		echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    	}
    }
    else {
    	echo 'Les variables du formulaire ne sont pas déclarées.';
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div class="pwd"></div>

</body>
</html>