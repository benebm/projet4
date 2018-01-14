<?php $header = '<a href="index.php?action=readall">Articles</a> / Supprimer votre article'; ?>

<?php ob_start(); ?>
      <h1>Supprimer votre article</h1>
      <hr>
      <div class="text-center">
        <h4>Attention, si vous validez la suppression, votre article sera définitivement supprimé</h4>
         <h4>SUPPRIMER L'ARTICLE ?</h4><br />
        <form method="post"><input type="hidden" name="form_upload" />
          <input class="btn btn-primary btn-block" type="submit" value="Valider" />
        </form>
        <div class="text-center">
          <br /><a href="index.php?action=readall"><i class="fa fa-arrow-left"></i> Revenir à la liste des articles</a> 
        </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>





