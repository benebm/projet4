<?php $header = '<a href="index.php">Articles</a> / Mettre à jour votre article'; ?>

<?php ob_start(); ?>
      <h1>Modifier le contenu de votre article</h1>
      <hr>
      <div class="card-body">
        <form method="post" action="index.php?action=saveupdate&id=<?= $post['id'] ?>">
          <div class="form-group">
            <label for="title">Nouveau titre de l&rsquo;article</label> : <br /><input class="form-control" type="text" name="title" id="title" value="<?= $post['title'] ?>" />
          </div>
          <div class="form-group">
            <label for="subtitle">Nouveau sous-titre de l&rsquo;article</label> : <br /><input class="form-control" type="text" name="subtitle" id="subtitle" value="<?= $post['subtitle'] ?>" />
          </div>
          <div class="form-group">
            <label for="content">Nouveau contenu de l&rsquo;article</label> :  <br /><textarea class="form-control" name="content" id="content" rows="10"><?= $post['content'] ?></textarea>
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Valider" />
        </form>
        <div class="text-center">
          <br /><a href="index.php"><i class="fa fa-arrow-left"></i> Revenir à la liste des articles</a> &nbsp; | &nbsp;
          <a href="index.php?delete"><i class="fa fa-trash o"></i> Supprimer cet article</a>
        </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>



