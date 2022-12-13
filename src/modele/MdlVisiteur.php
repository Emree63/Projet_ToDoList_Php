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

}
