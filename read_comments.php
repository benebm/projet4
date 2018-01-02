<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p class="news"><a href="index.php">Voir la liste des dix derniers billets</a></p>
 
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

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête
?>

<div class = "comments">
<h2>Commentaires</h2>

<h4>Poster un commentaire</h4>

<form action="save_comments.php?billet=<?php echo $donnees['id']; ?>" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <br /><textarea name="message" id="message" rows="5" cols="50">Votre commentaire</textarea><br />
        
        <input type="submit" value="Envoyer" />
    </p>
    </form>

<h4>Commentaires récents</h4>

<?php
$billet = $_GET['billet'];
$req = $bdd->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? AND OKmodo = "approved" ORDER BY date_commentaire DESC');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>

<!--supprimer après cette ligne-->
<!--lien signaler qui appelle la page permettant de signaler (page invisible) avec l'id du commentaire (commentaire aura disparu)-->

<p>
<a href="report_comment.php?id_comment=<?php echo $donnees['id'] . "&billet=" . $billet ; ?>">Signaler le commentaire ?</a>
 </p>

<?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>

</div>
</body>
</html>

<input type="hidden" name="billet" value="<?php echo $donnees['id']; ?>">
