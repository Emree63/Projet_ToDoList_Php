<?php

namespace modeles;

class Modele
{

	public function __construct(){

	}

    public static function CreerUtilisateur(){
        global $dVueEreur; 
        $userGtw = new UtilisateurGateway();
        $verif = Validation::val_form_user($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["password-Form"],$_POST["mail-Form"],$dVueEreur);
        if($verif == false){
            throw new Exception();
        }
        $hash = password_hash($_POST[password-Form], PASSWORD_DEFAULT);
        $userGtw->AjouterUtilisateur($_POST["nom-Form"],$_POST["prenom-Form"],$_POST["pseudo-Form"],$_POST["mail-Form"],$_POST["password-Form"]);
    }

    public static function RecupererListePublic(){
        $userGtw = new UtilisateurGateway();

        $userGtw->getListePublic();
    }
    





}
