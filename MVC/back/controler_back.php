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


function addAPost ($title, $content)
{
    $affectedLines = saveAPost($title, $content);
    $postId = getNewPostID ();

    if ($affectedLines === false) {
         throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=readpost&id=' . $postId['id']);
    }
}

/*function showNewPostID ()

{
	$postId = getNewPostID ();

}*/

function post()
{
    $post = getPost($_GET['id']);

    require('readPostView.php');
}
