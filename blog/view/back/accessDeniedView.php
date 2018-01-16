<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Bienvenue sur votre page d'identification</title>
  <!-- Bootstrap core CSS-->
  <link href="../public_back/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../public_back/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../public_back/css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-access mx-auto mt-5">
      <div class="card-header">Identification</div>
      <div class="card-body">
        <form action="index.php?action=check" method="post">
          <div class="form-group">
            <label for="username">Pseudo</label><br /><input type="text" id="username" name="username" placeholder="Entrez votre identifiant" />
          </div>
          <div class="form-group">
            <label for="userpassword">Mot de passe</label><br /><input type="password" id="userpassword" name="userpassword" placeholder="Mot de passe" />
          </div>
          <div><input type="submit" class="btn btn-primary btn-block" /></div><br />
          <div class="denied"><p>Accès refusé : l'identifiant et/ou le mot de passe sont invalides !</p></div>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="../public_back/vendor/jquery/jquery.min.js"></script>
  <script src="../public_back/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../public_back/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
