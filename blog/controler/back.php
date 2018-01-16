<?php

// Chargement des classes
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');
require_once('../model/MemberManager.php');

// les fonctions suivantes sont liées à l'identification du membre

function showLogin ()
{
    require('../view/back/loginView.php');  
}

function checkPassword($username)
{
    $memberManager = new MemberManager();
    $result = $memberManager->getPassword(htmlspecialchars($_POST['username'])); // on sécurise les données venant de l'extérieur
    if (password_verify(htmlspecialchars($_POST['userpassword']), $result['userpassword'])) { // ici aussi
    $_SESSION['connect']=1;
    $_SESSION['username'] = $username;
    showCounts();
    }
    else {
    require('../view/back/accessDeniedView.php');
    }
}

function closeAccess ()
{
    $_SESSION = array();
    session_destroy();

    require('../view/back/loginView.php');
}

// les fonctions suivantes sont liées à toutes les actions qu'on peut faire sur un article

function showAllPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 

    require('../view/back/readAllPostsView.php');
}

function showCreatePostForm ()
{
	require('../view/back/createPostView.php');
}

function addPost ($title, $subtitle, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->savePost($title, $subtitle, $content);
    $postId = $postManager->getNewPostID ();

    if ($affectedLines === false) {
         throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postId['id']);
    }   
}

function showUpdatePostForm ()
{
	$postManager = new PostManager(); 
    $post = $postManager->getPost($_GET['id']);

	require('../view/back/updatePostView.php');
}

function managePost ($postId, $title, $subtitle, $content)
{
	 $postManager = new PostManager(); 
     $updatedLines = $postManager->updatePost($_GET['id'], $title, $subtitle, $content);

	 if ($updatedLines === false) {
         throw new Exception('Impossible de mettre à jour le post !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postId);
    }

}

function showDeleteForm ($postId)
{
	require('../view/back/deletePostView.php');
}

function clearPost ()
{
    $postManager = new PostManager(); 
	$postManager->deletePost ($_GET['id']);

	require ('../view/back/confirmSuppressionView.php');
}


function post()
{
    $postManager = new PostManager(); 
    $post = $postManager->getPost($_GET['id']);

    require('../view/back/readPostView.php');
}

// les fonctions suivantes sont liées à la modération de commentaires

function showPendingComments ()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->getPendingComments ();

    require('../view/back/moderateCommentsView.php');
}

function validateComment ($commentId)
{
    $commentManager = new CommentManager();
	$commentManager->approveComment($commentId);

	header('Location: index.php?action=moderate');
}

function invalidateComment ($commentId)
{
    $commentManager = new CommentManager();
	$commentManager->denyComment($commentId);
    
	header('Location: index.php?action=moderate');
}

// les fonctions suivantes sont des agrégats pour les widgets de la home

function showSumPosts ()
{
    $postManager = new PostManager(); 
    $sumPosts = $postManager->sumPosts(); 

    require('../view/back/homeView.php');
}

function showCounts ()
{
    $postManager = new PostManager(); 
    $sumPosts = $postManager->sumPosts(); 
    $commentManager = new CommentManager();
    $sumComments = $commentManager->sumPendingComments();

    require('../view/back/homeView.php');
}





