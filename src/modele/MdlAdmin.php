<?php

class MdlAdmin
{

	public function __construct(){
		
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

    public function recupererUtilisateur(){
		$userGtw = new UtilisateurGateway();
        return $userGtw->getUtilisateurs();
	}
    
	public function supprimerUtilisateur(){
		$userGtw = new UtilisateurGateway();
        $userGtw->SupprimerUtilisateur($_GET['idUser']);
	}

}
