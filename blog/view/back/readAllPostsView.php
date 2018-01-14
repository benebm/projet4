<?php $header = '<a href="index.php?action=readall">Articles</a> / Liste des articles'; ?>

<?php ob_start(); ?>
      <h1>Voici tous vos articles publiés</h1>
      <hr>
          <?php while ($data = $posts->fetch()) 
          {
          ?>
          
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">
                    <h4><?= $data['title'] ?></h4>
                        <h5><?= $data['subtitle'] ?></h5>
                        <p><em>Publié par Jean Forteroche le <?= $data['creation_date_fr'] ?></em></p>
                </div>
                <div class="card-body">
                    <div class="text-center mt-4 mb-5">
                      <p><?= $data['content'] ?></p>
                    </div>
                    <div class="text-center">
                        <a href="index.php?action=update&id=<?= $data['id'] ?>"><i class="fa fa-refresh"></i> Mettre à jour l'article</a> &nbsp;|&nbsp;
                        <a href="index.php?action=delete&id=<?= $data['id'] ?>"><i class="fa fa-trash o"></i> Supprimer l'article</a> 
                    </div>
                </div>
            </div>
        </div>
                
        <?php
        }
        $posts->closeCursor();
        ?>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>



        
 
    