<?php

require_once("Manager.php"); 

class PostManager extends Manager
{

    public function getPosts ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');
        return $req;
    }


    public function getPost ($postId)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function savePost ($title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $req->execute(array($title, $content));
        return $affectedLines;
    }

    public function getNewPostID ()
    {
        $db = $this->dbConnect();
        $req2 = $db->query('SELECT id FROM posts ORDER BY creation_date DESC');       
        $postId = $req2->fetch();
        return $postId;
    }

    public function updatePost ($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :postId');
        $updatedLines = $req->execute(array(
            'title' => $title,
            'content' => $content,
            'postId' => $postId));
        return $updatedLines;
    }

    public function deletePost ($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = :postId');
        $req->execute(array(
            'postId' => $postId));
    }



}



