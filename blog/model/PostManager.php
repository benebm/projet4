<?php

require_once("Manager.php"); 

class PostManager extends Manager
{

    public function getPosts ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, subtitle, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM blog_oc4_posts ORDER BY creation_date DESC');
        return $req;
    }


    public function getPost ($postId)
    {   
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, subtitle, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM blog_oc4_posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function savePost ($title, $subtitle, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO blog_oc4_posts (title, subtitle, content, creation_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($title, $subtitle, $content));
        return $affectedLines;
    }

    public function getNewPostID ()
    {
        $db = $this->dbConnect();
        $req2 = $db->query('SELECT id FROM blog_oc4_posts ORDER BY creation_date DESC');       
        $postId = $req2->fetch();
        return $postId;
    }

    public function updatePost ($postId, $title, $subtitle, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE blog_oc4_posts SET title = :title, subtitle = :subtitle, content = :content WHERE id = :postId');
        $updatedLines = $req->execute(array(
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'postId' => $postId));
        return $updatedLines;
    }

    public function deletePost ($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM blog_oc4_posts WHERE id = :postId');
        $req->execute(array(
            'postId' => $postId));
    }


    public function sumPosts ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_posts FROM blog_oc4_posts'); 
        $sumPosts = $req->fetch();
        return $sumPosts;   
    }


}



