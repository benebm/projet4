<?php ob_start(); ?>
<header class="masthead" style="background-image: url('public_front/img/post.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= $post['title']; ?></h1>
              <h2 class="subheading"><?= $post['subtitle']; ?></h2>
              <span class="meta">Publié par
                <a href="#">Jean Forteroche</a>
                le <?= $post['creation_date_fr']; ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
            <p><?= $post['content']; ?></p>
                <div><h4>Commentaires</h4>
                  <em>Votre commentaire a bien été envoyé ! Il sera publié après modération.</em>
                </div><br />
                <div><h4>Commentaires récents</h4>
                <?php while ($comment = $comments->fetch()) 
                {?>
                    <p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?></p>
                    <p><?= htmlspecialchars($comment['comment']); ?></p>
                    <p><a href="index.php?action=report&commentId=<?= $comment['id'] . "&id=" . $post['id'] ; ?>">Signaler le commentaire ?</a></p>
                <?php
                }?>
                </div>
          </div>
        </div>
      </div>
    </article>
    <hr>
<?php $content = ob_get_clean(); ?>
<?php require('templateFrontBlog.php'); ?>






