<?php $header = '<a href="index.php">Accueil</a>'; ?>
      
<?php ob_start(); ?>
      <h1>Bienvenue, <?= $_SESSION['firstname'];?> !</h1>
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?= $sumPosts['total_posts']?> articles publiés</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?action=readall">
              <span class="float-left">Accéder à la liste des articles</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?= $sumComments['pending_comments'] ?> commentaires en attente</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?action=moderate">
              <span class="float-left">Accéder à l'espace de modération</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 
      </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateBackBlog.php'); ?>
