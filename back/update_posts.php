<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
	<link href="style.css" rel="stylesheet" /> 
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
</script>
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


<?php // Récupération du billet
$req = $bdd->prepare('SELECT titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<form method="post">
        <p>
        <label for="updatedtitle">Nouveau titre de l&rsquo;article</label> : <br /><input type="text" name="updatedtitle" id="updatedtitle" style="width:1000px;" value="<?php echo htmlspecialchars($donnees['titre']); ?>" /><br />
        <label for="updatedcontent">Nouveau contenu de l&rsquo;article</label> :  <br /><textarea name="updatedcontent" id="updatedcontent" rows="15" cols="125"><?php
    echo (htmlspecialchars($donnees['contenu']));
    ?></textarea><br />
        
        <input type="submit" value="Valider" />
    </p>
    </form>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête
?>


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
<h4><a href="read_post.php?billet=<?php echo $id_billets; ?>">Afficher l'article</a></h4>
<?php
$req->closeCursor();
}
else {
}

?>

</body>
</html>






