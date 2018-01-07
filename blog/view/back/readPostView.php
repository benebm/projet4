<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Bienvenue dans votre espace d'administration</h1>
 
        <h4>Voici votre nouvel article :</h4>
        <div class="news">
            <h5><?= htmlspecialchars($post['title']); ?><em>le <?= $post['creation_date_fr']; ?></em></h5>
            <p><?= nl2br(htmlspecialchars($post['content']));?></p>
        </div>
        <h4><a href="index.php?action=update&id=<?= $post['id'] ?>">Mettre à jour l'article</a></h4>
        <h4><a href="index.php?action=delete&id=<?= $post['id'] ?>">Supprimer l'article</a></h4>
          
    </body>
</html>