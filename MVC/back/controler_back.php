<?php

require('model_back.php');

function showAllPosts()
{
    $posts = getAllPosts();

    require('readAllPostsView.php');
}


function showCreatePostForm ()
{
	require('createPostView.php');
}


function addPost ($title, $content)
{
    $affectedLines = savePost($title, $content);
    $postId = getNewPostID ();

    if ($affectedLines === false) {
         throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postId['id']);
    }
    
}

function showUpdatePostForm ()
{
	$post = getPost($_GET['id']);

	require('updatePostView.php');
}


function managePost ($postId, $title, $content)
{
	 $updatedLines = updatePost($_GET['id'], $title, $content);

	 if ($updatedLines === false) {
         throw new Exception('Impossible de mettre à jour le post !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postId);
    }

}

function showDeleteForm ($postId)
{
	require('deletePostView.php');
}

function clearPost ()
{
	deletePost ($_GET['id']);
	require ('deletePostView.php');
	echo "Votre article a bien été supprimé";
}


function post()
{
    $post = getPost($_GET['id']);

    require('readPostView.php');
}






