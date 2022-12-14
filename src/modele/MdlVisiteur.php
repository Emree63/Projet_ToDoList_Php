<?php

class MdlVisiteur
{

	public function __construct(){

	}

	public static function CreerUtilisateur(){
        global $dVueEreur; 
        $userGtw = new UtilisateurGateway();
        Validation::val_form_user($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["password-Form"],$_POST["mail-Form"],$dVueEreur);
        $hash = password_hash($_POST["password-Form"], PASSWORD_DEFAULT);
        // if(count($dVueEreur)!=0){
        //     return null;
        // }
        $userGtw->AjouterUtilisateur($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["mail-Form"],$hash);
    }

    public static function RecupererListePublic(){
        $userGtw = new ListeGateway(); 

        return $userGtw->getListePublic(0,10);
    }

    public static function RecupererTache(){
        $userGtw = new TacheGateway();
        return $userGtw->getTache();
    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
    public static function SupprimerTache(){
        $userGtw = new TacheGateway();
        $id = $_GET['idTache'];
        $userGtw->Supprimer($id);
    }

    public static function SupprimerListe(){
        $userGtw = new ListeGateway();
        $taskGtw = new TacheGateway();
        $id = $_GET['idListe'];
        $taskGtw->SupprimerViaListe($id);
        $userGtw->Supprimer($id);
    }

    public function AjouterTache(){
        $taskGtw = new TacheGateway();
        $id = $_POST['idListe'];
        $nom = $_POST['nom-ajout'];
        $description = $_POST['description-ajout'];
        $taskGtw->AjouterTache($nom, $description,false,$id);
    }

    public function ModifierListe(){
        $userGtw = new ListeGateway();
        $id = $_POST['idListe'];
        $nom = $_POST['nom-modif-liste'];
        $description = $_POST['description-modif-liste'];
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

    public function AjouterListePublic(){
        $taskGtw = new ListeGateway();
        $nom = $_POST['nom-ajout-liste'];
        $description = $_POST['description-ajout-liste'];
        $taskGtw->Ajouter($nom, $description,1, true);
    }

    public function check(){
        $taskGtw = new TacheGateway();
        $id = $_POST['idTache'];
        $taskGtw->isDone($id);
    }

}
