<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
    <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Espace d'administration</h1>
        <p class="news">Mon dernier article posté sur le blog :</p>
 
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
    <br />

    <h4><a href="update_posts.php?billet=<?php echo $donnees['id']; ?>">Modifier l'article</a></h4>
    <h4><a href="delete_posts.php?billet=<?php echo $donnees['id']; ?>">Supprimer l'article</a></h4>
    <h4><a href="create_posts.php">Créer un nouvel article</a></h4>
    </p>

</div>
<?php
$req->closeCursor();
?>
</body>
</html>



