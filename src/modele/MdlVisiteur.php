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

}
