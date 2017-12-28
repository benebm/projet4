<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Espace d'administration</h1>
 
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
?>
<h4>Supprimer votre article</h4>

<h3>Attention, si vous validez la suppression, votre article sera définitivement supprimé</h3>
<form method="post">
  <input type="hidden" name="form_upload" />
        <p>
        Supprimer l'article ?
        <input type="submit" value="Valider" />
    </p>
    </form>

<?php

if ( isset($_POST['form_upload']) )
{
$id_billets = $_GET['billet'];
$req = $bdd->prepare('DELETE FROM billets WHERE id = :idbillet');
$req->execute(array(
  'idbillet' => $id_billets
  ));
echo "Votre article a bien été supprimé!"; ?>
<h4><a href="create_posts.php">Créer un nouvel article</a></h4>
<?php
$req->closeCursor();
}
else { ?>
  <a href="read_lastpost.php">Annuler et revenir à l'article</a>
<?php }

?>

</body>
</html>






