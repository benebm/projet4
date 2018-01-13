<?php $header = '<a href="index.php">Articles</a> / Créer un article'; ?>

<?php ob_start(); ?>
      <h1>Ecrire un nouvel article</h1>
      <hr>
      <div class="card-body">
        <form method="post" action="index.php?action=addpost">
          <div class="form-group">
            <label for="title">Titre de l&rsquo;article</label> : <br /><input class="form-control" type="text" name="title" id="title" />
          </div>
          <div class="form-group">
            <label for="subtitle">Sous-titre de l&rsquo;article</label> : <br /><input class="form-control" type="text" name="subtitle" id="subtitle" />
          </div>
          <div class="form-group">
            <label for="content">Contenu de l&rsquo;article</label> :  <br /><textarea class="form-control" name="content" id="content" rows="10"></textarea>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Valider" />
        </form>
        <div class="text-center">
          <br /><a href="index.php"><i class="fa fa-arrow-left"></i> Revenir à la liste des articles</a>
        </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>