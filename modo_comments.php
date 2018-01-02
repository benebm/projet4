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
<h4>Modérer les commentaires</h4>
<?php
// On affiche tous les commentaires pas encore modérés
$req = $bdd->query('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE OKmodo IS NULL ORDER BY date_commentaire');

while ($donnees = $req->fetch())
{
?>
<p>
    <strong>
        <?php echo htmlspecialchars($donnees['auteur']); ?>
        le <?php echo $donnees['date_commentaire_fr']; ?>
    </strong>
  <br />
    <em>
    <?php
    echo nl2br(htmlspecialchars($donnees['commentaire']));
    ?>
    </em>
  </p>

    <p><form method="post" action="approve_comments.php?id_comment=<?php echo $donnees['id']; ?>">
      Autoriser la publication du commentaire ?
<input type="radio" name="OKmodo" value="approved" id="oui" /> <label for="oui">Approuver</label>
<input type="radio" name="OKmodo" value="denied" id="non" checked="checked" /> <label for="non">Refuser</label>
<input type="submit" value="Valider" />
    </p>

<?php
} // Fin de la boucle des commentaires
$req->closeCursor();

if (isset($_GET['OKmodo']) && (($_GET['OKmodo']) == "approved"))
{
echo "Le commentaire a bien été approuvé et est en ligne!";
}
else if (isset($_GET['OKmodo']) && (($_GET['OKmodo']) == "denied"))
{
echo "Le commentaire n'a pas été approuvé et ne sera pas publié";
}
else {

}
?>
</body>
</html>
