<?php
require('controler_back.php');

try {

    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'create' ) 

            {
            
                showCreatePostForm ();
            
            }


        else if ($_GET['action'] == 'addapost' )
        {    
           addAPost($_POST['title'], $_POST['content']);

        }


        else if ($_GET['action'] == 'readpost' && isset($_GET['id'])) 
        {
            post();
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
    require('view/errorView.php');    
}
