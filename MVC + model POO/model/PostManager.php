<?php

require_once("../model/Manager.php"); 

class PostManager extends Manager
{

    public function getPosts ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC');
        return $req;
    }


    public function getPost ($postId)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function savePost ($title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(?, ?, NOW())');
        $affectedLines = $req->execute(array($title, $content));
        return $affectedLines;
    }

    public function getNewPostID ()
    {
        $db = $this->dbConnect();
        $req2 = $db->query('SELECT id FROM billets ORDER BY date_creation DESC');       
        $postId = $req2->fetch();
        return $postId;
    }

    public function updatePost ($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE billets SET titre = :title, contenu = :content WHERE id = :postId');
        $updatedLines = $req->execute(array(
            'title' => $title,
            'content' => $content,
            'postId' => $postId));
        return $updatedLines;
    }

    public function deletePost ($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM billets WHERE id = :postId');
        $req->execute(array(
            'postId' => $postId));
    }



}



