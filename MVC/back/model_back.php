<?php

function getAllPosts ()
{
	$db = dbConnect();
	$req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC');
	return $req;
}

function savePost ($title, $content)
{
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())');
    $affectedLines = $req->execute(array($title, $content));
    return $affectedLines;
}

function getNewPostID ()
{
	$db = dbConnect();
	$req2 = $db->query('SELECT id FROM billets ORDER BY date_creation DESC');       
	$postId = $req2->fetch();
	return $postId;
}


function getPost ($postId)
{	
	$db = dbConnect();
	$req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
	$req->execute(array($postId));
	$post = $req->fetch();
	return $post;
}

function updatePost ($postId, $title, $content)
{
	$db = dbConnect();
	$req = $db->prepare('UPDATE billets SET titre = :title, contenu = :content WHERE id = :postId');
	$updatedLines = $req->execute(array(
		'title' => $title,
		'content' => $content,
		'postId' => $postId));
	return $updatedLines;
}

function deletePost ($postId)
{
	$db = dbConnect();
	$req = $db->prepare('DELETE FROM billets WHERE id = :postId');
	$req->execute(array(
		'postId' => $postId));
}

function dbConnect ()
{
	try
	{
    	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    	return $db;
	}
	catch(Exception $e)
	{
	   	die('Erreur : '.$e->getMessage());
	}
}




