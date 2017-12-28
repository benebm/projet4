<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Bienvenue dans votre espace d'administration</h1>
        <!--<p class="news"><a href="index.php">Retour à la liste des billets</a></p>-->
 
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
<h4>Ecrire un nouvel article</h4>

<form method="post">
        <p>
        <label for="titre">Titre de l&rsquo;article</label> : <br /><input type="text" name="title" id="title" style="width:1000px;" /><br />
        <label for="contenu">Contenu de l&rsquo;article</label> :  <br /><textarea name="content" id="content" rows="15" cols="125"></textarea><br />
        
        <input type="submit" value="Valider" />
    </p>
    </form>

<?php
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())');

if (!empty($_POST['title']) && !empty($_POST['content']))

    {
       $req->execute(array($_POST['title'], $_POST['content'])); 
       echo "Votre article a bien été posté!"; ?>
       <h4><a href="index.php">Afficher l'article</a></h4>
       <h4><a href="create_posts.php">Créer un autre article</a></h4>

       <?php 
    }
else
    { 
    }

$req->closeCursor();
?>


    
<!--lien prévisualiser vers index-->

<!--lien modifier vers page modifier-->
<!--lien supprimer vers page supprimer-->


</body>
</html>




