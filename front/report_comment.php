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

$billet = $_GET['billet']; 	
$id_comment = $_GET['id_comment']; 	 
$req = $bdd->prepare('UPDATE commentaires SET OKmodo = NULL WHERE id = :id_comment');
$req->execute(array(
	'id_comment' => $id_comment));
$req->closeCursor();


// Redirection du visiteur vers la page du minichat
header('Location: read_comments.php?id_comment='.$_GET['id_comment'].'&billet='.$_GET['billet'].'');
