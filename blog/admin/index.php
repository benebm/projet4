<?php
require('../controler/back.php');

try {

	session_start();
	if (isset($_SESSION['connect'])) // si une session existe
	{    
    	if (isset($_GET['action'])) // et si il y a une action en paramètre dans l'URL
    	{   
        	if ($_GET['action'] == 'readall') 
            	{           
                	showAllPosts();            
            	}
               
        	else if ($_GET['action'] == 'create') 
            	{           
                	showCreatePostForm ();            
            	}

        	else if ($_GET['action'] == 'addpost' )
            	if (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])) 
            	{
                	addPost ($_POST['title'], $_POST['subtitle'], $_POST['content']);
            	}
             	else
            	{    
                	throw new Exception('Tous les champs ne sont pas remplis !');
            	}

        	else if ($_GET['action'] == 'readpost') 
            	if (isset($_GET['id']) && ($_GET['id'] > 0))
            	{
                	post();
            	}
            	else
            	{
                	throw new Exception('Aucun identifiant de billet envoyé');
            	}

        	else if ($_GET['action'] == 'update')
            	if (isset($_GET['id']) && ($_GET['id'] > 0))
            	{
                	showUpdatePostForm ();
            	}
            	else
            	{
                	throw new Exception('Aucun identifiant de billet envoyé');
            	}

        	else if ($_GET['action'] == 'saveupdate')
            	if (isset($_GET['id']) && ($_GET['id'] > 0) && (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])))
            	{
                	managePost ($_GET['id'], $_POST['title'], $_POST['subtitle'], $_POST['content']);
            	}
            	else
            	{
                	throw new Exception('Il manque l\'identifiant du billet ou bien tous les champs ne sont pas remplis');
            	}

        	else if ($_GET['action'] == 'delete')
            	if (isset($_GET['id']) && ($_GET['id'] > 0))
            	{
                	if (!isset($_POST['form_upload']))
                	{
                    	showDeleteForm ($_GET['id']);
                	}
                	else if (isset($_POST['form_upload']))
                	{
                    	clearPost ();
                	}
            	}
            	else
            	{
                	throw new Exception('Aucun identifiant de billet envoyé');
            	}

        	else if ($_GET['action'] == 'moderate')
        	{
            	if (!isset($_GET['id']))
            	{
                	showPendingComments ();
            	}
            	else if (isset($_GET['id']) && ($_GET['id'] > 0) && !empty($_POST['comment_status']))
            	{
                	if ($_POST['comment_status'] == 'approved')
                	{
                    validateComment ($_GET['id']);
                	}
                	else if ($_POST['comment_status'] == 'denied')
                	{
                    	invalidateComment ($_GET['id']);
                	}
            	}
            	else 
            	{
                	throw new Exception('Il manque l\'identifiant de billet ou bien la valeur du bouton est vide');
            	}
        	}
        	else if ($_GET['action'] == 'logout') 
            	{           
                	closeAccess ();       
            	} 
    	}
    	else // si il y a une session mais pas d'action, par défaut on montre la home back
    	{
        	showCounts ();
    	}
	}

	else if (isset($_GET['action']) && ($_GET['action'] == 'check')) // si pas de session avec action check, on lance la fonction qui vérifie le mot de passe
    {           
        checkPassword($_POST['username']);             
    }

	else // si pas de session et pas d'action, on montre la page de login
	{
    	showLogin();
	}

}

catch(Exception $e) 
{ 
    $errorMessage = $e->getMessage();
    require('../view/back/errorView.php');    
}
