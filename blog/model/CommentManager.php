<?php

require_once("Manager.php"); // appel à l'objet parent qui gère la connexion BDD

class CommentManager extends Manager // modélisation du prototype d'objet 'commentaire'
{

    public function getComments ($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM blog_oc4_comments WHERE postId = ? AND comment_status = "approved" ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    public function postComment ($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO blog_oc4_comments (postId, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }

    public function resetComment ($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE blog_oc4_comments SET comment_status = NULL WHERE id = :commentId');
        $req->execute(array(
        'commentId' => $commentId));
    }

    public function getPendingComments ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM blog_oc4_comments WHERE comment_status IS NULL ORDER BY comment_date');
        return $req;    
    }

    public function approveComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE blog_oc4_comments SET comment_status = "approved" WHERE id = :commentId');
        $commentApproved = $req->execute(array(
        'commentId' => $commentId));
    }

    public function denyComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE blog_oc4_comments SET comment_status = "denied" WHERE id = :commentId');
        $commentDenied = $req->execute(array(
        'commentId' => $commentId));
    }

    public function sumPendingComments ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS pending_comments FROM blog_oc4_comments WHERE comment_status IS NULL'); 
        $sumComments = $req->fetch();
        return $sumComments;   
    }
   
}