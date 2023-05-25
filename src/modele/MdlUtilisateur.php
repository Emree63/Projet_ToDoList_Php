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
            if($gtw->existeAdmin($userCurrent->getId())){
                $_SESSION['role']='admin'; 
            }
            else{
                $_SESSION['role']='user'; 
            }
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
            $pseudo=Validation::cleanPseudo($_SESSION['pseudo']);
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

    public static function recupererNombreDeListe(){
        $listeGtw = new ListeGateway();
        $id = Validation::cleanInt($_SESSION['id']);
        return $listeGtw->CountListe(intval($id));
    }

    public function ModifierListe(&$dVueErreur){
        $userGtw = new ListeGateway();
        $id = $_POST['idListe'];
        $nom = Validation::cleanText($_POST['nom-modif-liste']);
        $description = Validation::cleanText($_POST['description-modif-liste']);

        if($nom == NULL && $description==null){
            return null;
        }
        if($description == NULL){
            $userGtw->EditerNom($id, $nom);
        }
        else if($nom == NULL){
            $userGtw->EditerDescription($id, $description);
        }
        else{
             $userGtw->Editer($id, $nom, $description);
        }  
    }
    
    public static function suppressionUtilisateur(){
        
        $userGtw = new UtilisateurGateway();
        $id=Validation::cleanInt($_SESSION['id']);
        $userGtw->SupprimerUtilisateur(intval($id));
        MdlUtilisateur::déconnexion();
    }

    public static function changerMotDePasse(){
        $userGtw = new UtilisateurGateway();
        $id=Validation::cleanInt($_SESSION['id']);
        $mail=Validation::cleanMail($_SESSION['email']);
        $mdp=$_POST['passwordCurrent'];
        $newMdp=$_POST['newPassword'];
        $verif_pass=$userGtw->getCredentials($mail);
		if(password_verify($mdp,$verif_pass)){
            if($newMdp == $_POST['confirmNewPassword']){
                if (!preg_match('/^.{5,}$/', $mdp)) {
                    throw new Exception("Mot de passe trop faible. Veuillez recommencer !");
                }
                else {
                    $userGtw->modifMdp($id, password_hash($newMdp, PASSWORD_DEFAULT));
                } 
            }
            else throw new Exception("Erreur lors de la confirmation du mot de passe.");
        } 
        else throw new Exception("Mot de passe Incorrect");

    }

    public static function AjouterListePrive(&$dVueErreur){
        $listGtw = new ListeGateway();
        $nom=$_POST['nom-ajout-liste'];
        $description=$_POST['description-ajout-liste'];
        $idCreateur =Validation::cleanInt($_SESSION['id']);
        Validation::val_form_add($nom,$description,$dVueErreur);
        $listGtw->Ajouter($nom, $description,0, $idCreateur);
    }

     public static function RecupererListePrive(){
        $listeGtw = new ListeGateway(); 
        if(isset($_SESSION["pageUser"]))
            return $listeGtw->getListePrive(($_SESSION["pageUser"]-1)*5,5);
        else
            return $listeGtw->getListePrive(1,10);
    }

    public static function RecupererTache(){
        $taskGtw = new TacheGateway();
        return $taskGtw->getTache();
    }

    public static function SupprimerListe(){
        $listeGtw = new ListeGateway();
        $taskGtw = new TacheGateway();
        $id = $_GET['idListe'];
        $taskGtw->SupprimerViaListe($id);
        $listeGtw->Supprimer($id);
    }

    public static function check(){
        $taskGtw = new TacheGateway();
        $id = $_POST['idTache'];
        $taskGtw->isDone($id);
    }

    public static function SupprimerTache(){
        $taskGtw = new TacheGateway();
        $id = $_GET['idTache'];
        $taskGtw->Supprimer($id);
    }

    public function AjouterTache(&$dVueErreur){
        $taskGtw = new TacheGateway();
        $id = $_POST['idListe'];
        $nom = $_POST['nom-ajout'];
        $description = $_POST['description-ajout'];
        Validation::val_form_add($nom,$description,$dVueErreur);
        $taskGtw->AjouterTache($nom, $description,false,$id);
    }

}
