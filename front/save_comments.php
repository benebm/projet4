<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}



// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire, OKmodo) VALUES(?, ?, ?, NOW(), NULL)');
$req->execute(array($_GET['billet'], $_POST['pseudo'], $_POST['message']));
$req->closeCursor();


// Redirection du visiteur vers la page du minichat
header('Location: read_comments.php?billet='.$_GET['billet'].'');
?>