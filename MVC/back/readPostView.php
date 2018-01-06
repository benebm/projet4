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
            <h5><?= htmlspecialchars($post['titre']); ?><em>le <?= $post['date_creation_fr']; ?></em></h5>
            <p><?= nl2br(htmlspecialchars($post['contenu']));?></p>
        </div>
          
    </body>
</html>