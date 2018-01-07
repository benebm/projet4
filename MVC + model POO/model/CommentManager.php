<?php

require_once("../model/Manager.php");

class CommentManager extends Manager
{

    public function getComments ($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? AND OKmodo = "approved" ORDER BY date_commentaire DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    
    public function postComment ($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
        return $affectedLines;
    }


    public function resetComment ($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET OKmodo = NULL WHERE id = :commentId');
        $req->execute(array(
        'commentId' => $commentId));
    }


    public function getPendingComments ()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE OKmodo IS NULL ORDER BY date_commentaire');
        return $req;    
    }


    public function approveComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET OKmodo = "approved" WHERE id = :commentId');
        $commentApproved = $req->execute(array(
        'commentId' => $commentId));
    }

    public function denyComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE commentaires SET OKmodo = "denied" WHERE id = :commentId');
        $commentDenied = $req->execute(array(
        'commentId' => $commentId));
    }
   

}