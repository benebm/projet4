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


$id_comment = $_GET['id_comment'];

// Insertion du message à l'aide d'une requête préparée
if ($_POST['OKmodo'] == "approved")
{
$req = $bdd->prepare('UPDATE commentaires SET OKmodo = "approved" WHERE id = :id_comment');
$req->execute(array(
	'id_comment' => $id_comment));
$req->closeCursor();
}

else if  ($_POST['OKmodo'] == "denied")
{	
$req = $bdd->prepare('UPDATE commentaires SET OKmodo = "denied" WHERE id = :id_comment');
$req->execute(array(
	'id_comment' => $id_comment));
$req->closeCursor();
}

// Redirection du visiteur vers la page du minichat
header('Location: modo_comments.php?OKmodo='.$_POST['OKmodo'].'');
?>
