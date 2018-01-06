<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Bienvenue dans votre espace d'administration</h1>
 
        <h2>Voici tous vos articles existants</h2>
        <h4><a href="index.php?action=create">Ecrire un article</a></h4>

          <?php while ($data = $posts->fetch()) 
          {
          ?>
            <div class="news">
                <h3>
                <?= $data['titre'] ?>
                <em>le <?= $data['date_creation_fr'] ?></em>
                </h3>
                <p>
                <?= nl2br($data['contenu']) ?>
                <br />
                </p>
            </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </body>
</html>