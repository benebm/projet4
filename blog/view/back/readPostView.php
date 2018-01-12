<?php $header = '<a href="index.php">Articles</a> / Article mis à jour'; ?>

<?php ob_start(); ?>
      <h1>Voici votre nouvel article</h1>
      <hr>
          <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">
                    <h4><?= htmlspecialchars($post['title']); ?></h4>
                        <p><em>Publié par Jean Forteroche le <?= $post['creation_date_fr']; ?></em></p>
                </div>
                <div class="card-body">
                    <div class="text-center mt-4 mb-5">
                        
                        <p><?= nl2br(htmlspecialchars($post['content']));?></p>
                    </div>
                    <div class="text-center">
                        <a href="index.php?action=update&id=<?= $post['id'] ?>"><i class="fa fa-refresh"></i> Mettre à jour l'article</a> &nbsp;|&nbsp;
                        <a href="index.php?action=delete&id=<?= $post['id'] ?>"><i class="fa fa-trash o"></i> Supprimer l'article</a> 
                    </div>
                </div>
            </div>
        </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>



