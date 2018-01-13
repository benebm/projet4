<?php
require('../controler/back.php');

try {
    if (isset($_GET['action']))
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
  
    }

    else
    {
        showCounts ();
    }
}


catch(Exception $e) { 
    $errorMessage = $e->getMessage();
    require('../view/back/errorView.php');    
}
