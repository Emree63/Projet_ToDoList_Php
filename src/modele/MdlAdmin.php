<?php

class MdlAdmin
{

	public function __construct(){
		
	}
		
	public function deconnexion(){
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
		
    public function isConnected(){
        if(isset($_SESSION['id']) && isset($_SESSION['role']) && $_SESSION['role']=='admin') {
            $id=Validation::cleanInt($_SESSION['id']);
            $nom=Validation::cleanString($_SESSION['nom']);
            $prenom=Validation::cleanString($_SESSION['prenom']);
            $pseudo=Validation::cleanPseudo($_SESSION['pseudo']);
            $email=Validation::cleanMail($_SESSION['email']);
            return new Utilisateur($id,$nom,$prenom,$pseudo,$email);
        }
        else return null;
    }
	
	public function supprimerUtilisateur(){
		
	}

}
