<?php $header = '<a href="index.php">Accueil</a>'; ?>

<?php ob_start(); ?>
      <h1>Hm, c'est embarrassant</h1>
      <hr>
      <!-- Icon Cards-->
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>