<?php

class MdlVisiteur
{

	public function __construct(){

	}

	public static function CreerUtilisateur(&$dVueErreur){
        $userGtw = new UtilisateurGateway();
        Validation::val_form_user($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["password"],$_POST["mail"],$dVueErreur);
        $userGtw->isExisteViaMail($_POST["mail"]);
        $userGtw->isExisteViaPseudo($_POST["pseudo-Form"]);
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $userGtw->AjouterUtilisateur($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["mail"],$hash);
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

    public function AjouterTache(&$dVueErreur){
        $taskGtw = new TacheGateway();
        $id = $_POST['idListe'];
        $nom = $_POST['nom-ajout'];
        $description = $_POST['description-ajout'];
        Validation::val_form_add($nom,$description,$dVueErreur);
        $taskGtw->AjouterTache($nom, $description,false,$id);
    }

    public function ModifierListe(&$dVueErreur){
        $userGtw = new ListeGateway();
        $id = $_POST['idListe'];
        $nom = Validation::cleanText($_POST['nom-modif-liste']);
        $description = Validation::cleanText($_POST['description-modif-liste']);

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

    public function AjouterListePublic(&$dVueErreur){
        $taskGtw = new ListeGateway();
        $nom=$_POST['nom-ajout-liste'];
        $description=$_POST['description-ajout-liste'];
        Validation::val_form_add($nom,$description,$dVueErreur);
        $taskGtw->Ajouter($nom, $description,1, null);
    }

    public function check(){
        $taskGtw = new TacheGateway();
        $id = $_POST['idTache'];
        $taskGtw->isDone($id);
    }


}
