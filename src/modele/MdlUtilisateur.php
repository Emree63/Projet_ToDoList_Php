<?php

class MdlUtilisateur
{

    public function __construct(){

    }

    public function connection(){
        $gtw=new UtilisateurGateway();
        $mail=Validation::cleanMail($_POST['mail']);
        $mdp=$_POST['password'];
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

    public function isConnected(){
        if(isset($_SESSION['id']) && isset($_SESSION['role'])) {
            $id=Validation::cleanInt($_SESSION['id']);
            $nom=Validation::cleanString($_SESSION['nom']);
            $prenom=Validation::cleanString($_SESSION['prenom']);
            $pseudo=Validation::cleanString($_SESSION['pseudo']);
            $email=Validation::cleanMail($_SESSION['email']);
            return new Utilisateur($id,$nom,$prenom,$pseudo,$email);
        }
        else return null;
    }
        

    public static function déconnexion(){
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
    
    public function suppressionUtilisateur(){
        $userGtw = new UtilisateurGateway();
        $id=Validation::cleanInt($_SESSION['id']);
        $userGtw->SupprimerUtilisateur(intval($id));
        MdlUtilisateur::déconnexion();
    }

    public function AjouterListePrive(&$dVueErreur){
        $taskGtw = new ListeGateway();
        $nom=$_POST['nom-ajout-liste'];
        $description=$_POST['description-ajout-liste'];
        $idCreateur =Validation::cleanInt($_SESSION['id']);
        Validation::val_form_add($nom,$description,$dVueErreur);
        $taskGtw->Ajouter($nom, $description,0, $idCreateur);
    }

     public static function RecupererListePrive(){
        $userGtw = new ListeGateway(); 
        return $userGtw->getListePrive(0,10);
    }

}
