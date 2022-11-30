<?php

namespace modeles;

class Modele
{

	public function __construct(){

	}

    public static function CreerUtilisateur(){
        $userGtw = new UtilisateurGateway();
        $verif = Validation::val_form_user();
        if($verif == false){
            throw new Exception();
        }

        $userGtw->AjouterUtilisateur();
    }

    





}
