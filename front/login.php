<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body class="admin">
        <h1>Veuillez vous identifier pour accéder à votre espace d'administration</h1>
        <form method="post">
            <p>
            <label for="pseudo">Nom d'utilisateur</label> : <input type="text" name="pseudo" /> <br /> 
            <label for="password">Mot de passe</label> : <input type="password" name="password" />
            <input type="submit" value="Valider" />
            </p>
        </form>
 
<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if (!empty($_POST['password']) && !empty($_POST['pseudo']))
{
    $password = $_POST['password'];
    $pseudo = $_POST['pseudo'];

$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo AND password = :password');
$req->execute(array(
    'pseudo' => $pseudo,
    'password' => $password));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    echo 'Vous êtes connecté, ' . $pseudo . '! ';
?>
<a href="create_posts.php">Entrer dans votre espace membre</a>
<?php
}
}

?>

</body>
</html>