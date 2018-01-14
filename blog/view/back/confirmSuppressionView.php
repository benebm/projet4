<?php $header = '<a href="index.php?action=readall">Articles</a> / Supprimer votre article'; ?>

<?php ob_start(); ?>
      <h1>Supprimer votre article</h1>
      <hr>
      <div class="text-center">
        <h4>Votre article a bien été supprimé</h4>
        <div class="text-center">
          <br /><a href="index.php?action=readall"><i class="fa fa-arrow-left"></i> Revenir à la liste des articles</a> 
        </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>





