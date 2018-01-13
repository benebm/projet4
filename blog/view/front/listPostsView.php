<?php ob_start(); ?>
<header class="masthead" style="background-image: url('public/images/home.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Billet simple pour l'Alaska</h1>
              <span class="subheading">Le blog d'un aventurier du grand Nord</span>
            </div>
          </div>
        </div>
      </div>
    </header>
<?php $header = ob_get_clean(); ?>
<?php ob_start(); ?>
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
while ($data = $posts->fetch())
{?>
          <div class="post-preview">
            <a href="post.html">
              <h2 class="post-title"><?= $data['title'] ?></h2>
              <h3 class="post-subtitle"><?= $data['subtitle'] ?></h3>
            </a>
            <p class="post-meta">Publié par
              <a href="#">Jean Forteroche</a>
              le <?= $data['creation_date_fr'] ?></p>
          </div>
            <em><a href="index.php?action=post&id=<?= $data['id'] ?>">Lire l'article</a></em>
          <hr>
<?php
}
$posts->closeCursor();
?>
          <!-- Pager -->
          <!--<div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>-->
<?php $content = ob_get_clean(); ?>
<?php require('templateFrontBlog.php'); ?>