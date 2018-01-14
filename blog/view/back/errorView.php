<?php $header = '<a href="index.php">Accueil</a>'; ?>

<?php ob_start(); ?>
      <h1>Hum, c'est embarrassant</h1>
      <hr>
      <p>Nous n'avons pas trouvé la page que vous recherchez. <br />
      	 Cause de l'erreur : <?= $errorMessage ?> <i class="fa fa-smile-o"></i></p>

      <!-- Icon Cards-->
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>