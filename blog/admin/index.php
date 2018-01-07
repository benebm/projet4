<?php
require('../controler/back.php');

try {

    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'create' ) 
            {           
                showCreatePostForm ();            
            }


        else if ($_GET['action'] == 'addpost' )
        {    
           addPost ($_POST['title'], $_POST['content']);

        }


        else if ($_GET['action'] == 'readpost' && isset($_GET['id'])) 
        {
            post();
        }

        else if ($_GET['action'] == 'update' && isset($_GET['id']))
        {
            showUpdatePostForm ();
        }


        else if ($_GET['action'] == 'saveupdate' && isset($_GET['id']))
        {
            managePost ($_GET['id'], $_POST['title'], $_POST['content']);
        }

        else if ($_GET['action'] == 'delete' && isset($_GET['id']))
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

        else if ($_GET['action'] == 'moderate')
        {
            if (!isset($_GET['id']))
            {
                showPendingComments ();
            }
            else if (isset($_GET['id']))
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

        }


  
    }



    else
    {
        showAllPosts();
    }

}




catch(Exception $e) { 
    //echo 'Erreur : ' . $e->getMessage();
    $errorMessage = $e->getMessage();
    require('view/back/errorView.php');    
}
