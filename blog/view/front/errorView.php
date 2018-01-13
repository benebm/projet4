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
          <h4>Hum, c'est embarrassant</h4>
          <p>Nous n'avons pas trouvé la page que vous recherchez. <br />
          Il doit y avoir une erreur quelque part dans votre requête... <i class="fa fa-smile-o"></i></p> 
          <hr>
        </div>
      </div>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateFrontBlog.php'); ?>