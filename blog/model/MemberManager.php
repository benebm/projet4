<?php

require_once("Manager.php"); // appel à l'objet parent qui gère la connexion BDD

class MemberManager extends Manager // objet 'membre' qui permet simplement d'extraire le mot de passe en BDD correspondant au pseudo entré 
{

    public function getPassword ($username)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT userpassword FROM blog_oc4_members WHERE username = :username');
        $req->execute(array(
    	'username' => $username));
		$result = $req->fetch();
		return $result;
    	}

}
