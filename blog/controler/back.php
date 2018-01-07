<?php

// Chargement des classes
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');


function showAllPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('../view/back/readAllPostsView.php');
}


function showCreatePostForm ()
{
	require('../view/back/createPostView.php');
}


function addPost ($title, $content)
{
    $postManager = new PostManager();
    $affectedLines = $postManager->savePost($title, $content);
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


function managePost ($postId, $title, $content)
{
	 $postManager = new PostManager(); 
     $updatedLines = $postManager->updatePost($_GET['id'], $title, $content);

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

	require ('../view/back/deletePostView.php');
	echo "Votre article a bien été supprimé";
}


function post()
{
    $postManager = new PostManager(); 
    $post = $postManager->getPost($_GET['id']);

    require('../view/back/readPostView.php');
}

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


