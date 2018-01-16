<?php
require('controler/front.php');

try {
    if (isset($_GET['action'])) // s'il y a une action en paramètre de l'URL
    {
        if ($_GET['action'] == 'listPosts') 
        {
            listPosts();
        }        
        else if ($_GET['action'] == 'post') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                post();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'confirm') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                confirmComment ();
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'addComment') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment'])); // on sécurise les données venant de l'extérieur
                }
                else 
                {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }
            else 
            {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else if ($_GET['action'] == 'report')
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                reportComment($_GET['commentId'], $_GET['id']);
            }
            else 
            {
               throw new Exception('Aucun identifiant de commentaire envoyé'); 
            }  
    }
    else // si pas d'action, par défaut on montre la liste des articles qui sert de page d'accueil 
    {
        listPosts();
    }

}

catch(Exception $e) 
{ 
    $errorMessage = $e->getMessage();
    require('view/front/errorView.php');    
}
