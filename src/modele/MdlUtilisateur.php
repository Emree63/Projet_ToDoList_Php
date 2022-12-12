<?php

class MdlUtilisateur
{

	public function __construct(){

	}

    public function connection(){
		$gtw=new UtilisateurGateway();
		$mail=Validation::cleanString($_POST['mail']);
		$mdp=Validation::cleanString($_POST['password']);
        $verif_pass=$gtw->getCredentials($mail);
		if(password_verify($mdp,$verif_pass)){
            $userCurrent=$gtw->RechercheUtilisateurViaEmail($mail);
            $_SESSION['role']='user';
			$_SESSION['id']=$userCurrent->getId();
            $_SESSION['nom']=$userCurrent->getNom();
            $_SESSION['prenom']=$userCurrent->getPrenom();
            $_SESSION['pseudo']=$userCurrent->getPseudo();
            $_SESSION['email']=$userCurrent->getMail();
            return $userCurrent;    
		}
		else throw new Exception('Mot de passe incorrect*');
	}

    public static function RecupererListePublic(){
        $userGtw = new ListeGateway(); 
        return $userGtw->getListePublic(0,10);
    }

    public static function RecupererTache(){
        $userGtw = new TacheGateway();

        return $userGtw->getTache();
    }

    public static function SupprimerTache(string $id){
         $userGtw = new TacheGateway();

        return $userGtw->Supprimer($id);
    }

    public static function SupprimerListe(string $id){
         $userGtw = new ListeGateway();

        return $userGtw->Supprimer($id);
    }

}
