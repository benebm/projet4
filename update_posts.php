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
<h4>Modifier votre article</h4>

<form method="post">
        <p>
        <label for="updatedtitle">Nouveau titre de l&rsquo;article</label> : <br /><input type="text" name="updatedtitle" id="updatedtitle" style="width:1000px;" /><br />
        <label for="updatedcontent">Nouveau contenu de l&rsquo;article</label> :  <br /><textarea name="updatedcontent" id="updatedcontent" rows="15" cols="125"></textarea><br />
        
        <input type="submit" value="Valider" />
    </p>
    </form>

<?php

if (!empty($_POST['updatedtitle']) && !empty($_POST['updatedcontent']))
{
$id_billets = $_GET['billet'];
$updatedtitle = $_POST['updatedtitle'];
$updatedcontent = $_POST['updatedcontent'];

$req = $bdd->prepare('UPDATE billets SET titre = :updatedtitle, contenu = :updatedcontent WHERE id = :idbillet');
$req->execute(array(
  'updatedtitle' => $updatedtitle,
  'updatedcontent' => $updatedcontent,
  'idbillet' => $id_billets
  ));
echo "Votre article a bien été mis à jour!"; ?>
<h4><a href="read_lastpost.php">Afficher l'article</a></h4>
<?php
$req->closeCursor();
}
else {
}

?>

</body>
</html>






