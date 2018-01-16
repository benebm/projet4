<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// les fonctions suivantes sont liées à l'affichage des articles

function listPosts()
{
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts(); 

    require('view/front/listPostsView.php');
}


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/front/postView.php');
}

// les fonctions suivantes sont liées à l'affichage, à l'ajout et au signalement de commentaires

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=confirm&id=' . $postId);
    }
}

function confirmComment ()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    
    require('view/front/confirmCommentView.php');   
}


function reportComment ($commentId, $id)
{
    $commentManager = new CommentManager();
    $commentManager->resetComment ($_GET['commentId']);
    post($_GET['id']);
    
}












