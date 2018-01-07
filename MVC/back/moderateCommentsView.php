<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Bienvenue dans votre espace d'administration</h1>
 
        <h2>Voici vos commentaires en attente de modération</h2>

          <?php while ($data = $comments->fetch()) 
          {
          ?>
            <div class="news">
                <h3>
                <?= $data['auteur'] ?>
                <em>le <?= $data['date_commentaire_fr'] ?></em>
                </h3>
                <p>
                <?= nl2br($data['commentaire']) ?>
                </p>             
            </div>
            <p><form method="post" action="index.php?action=moderate&id=<?= $data['id']; ?>">
            Autoriser la publication du commentaire ?
            <input type="radio" name="OKmodo" value="approved" id="oui" /> <label for="oui">Approuver</label>
            <input type="radio" name="OKmodo" value="denied" id="non" /> <label for="non">Refuser</label>
            <input type="submit" value="Valider" />
            </p>

        <?php
        }
        $comments->closeCursor();
        ?>
    </body>
</html>