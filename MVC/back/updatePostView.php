<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Bienvenue dans votre espace d'administration</h1>
        <h4>Mettre à jour votre article</h4>

          <form method="post" action="index.php?action=saveupdate&id=<?= $post['id'] ?>">
            <p> 
            <label for="title">Nouveau titre de l&rsquo;article</label> : <br /><input type="text" name="title" id="title" style="width:1000px;" value="<?= $post['titre'] ?>" /><br />
            <label for="content">Nouveau contenu de l&rsquo;article</label> :  <br /><textarea name="content" id="content" rows="15" cols="125"><?= $post['contenu'] ?></textarea><br />
            <input type="submit" value="Valider" />
            </p>
          </form>
    </body>
</html>