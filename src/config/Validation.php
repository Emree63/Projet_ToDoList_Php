<?php

class Validation {

    static function val_form_user(string &$nom, string &$prenom, string &$pseudo, string &$mdp, string &$email, &$dVueEreur) {

        //Vérification Nom
        $nom = Validation::cleanString($nom);
        if ($nom == NULL) {
            $dVueEreur[] =	"Veuillez revoir le nom*";
        }

        //Vérification Prenom
        $prenom = Validation::cleanString($prenom);
        if ($prenom == NULL) {
            $dVueEreur[] =	"Veuillez revoir le prenom*";
        }

        // //Vérification Email
        // $prenom = val_mail($prenom,$dVueEreurdVue);
        // if ($prenom == NULL) {
        //     $dVueEreur[] =	"Veuillez revoir le mail*";
        // }

        // //Vérification Pseudo
        // if (!isset($pseudo)||$pseudo=="") {
        //     $dVueEreur[] =	"pas de pseudo";
        //     $pseudo="";
        //     $i++;
        // }

        // val_string($pseudo,$i,$dVueEreur);

        // //Vérification Mot de Passe
        // if (!isset($mdp)||$mdp=="") {
        //     $dVueEreur[] =	"pas de mot de passe";
        //     $mdp="";
        //     $i++;
        // }

        // val_string($mdp,$i,$dVueEreur);


        // if (!preg_match('/^.{5,}$/', $mdp)) {
        //     $dVueEreur[] =	"Mot de passe trop léger : Plus de 5 caractères minimum  !";
        //     $i++;
        // }

        // if($i>0){
        //     return false;
        // }
        // return true;

    }

    static function cleanString(string &$str) {
        $str = preg_replace('/[^A-Za-z\-]/', '', $str);
        if($str == null || $str == '')
        {
            return null;
        }
        return $str;
    }

    static function cleanMail(string &$str) {
        $str = preg_replace('/[^A-Za-z\-\^0-9\.\@]/', '', $str);
        if($str == null || $str == '')
        {
            return null;
        }
        return $str;
    }

    static function val_mail(string &$mail) {
        if(filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            return $mail;
        }
        return null;
    }

    static function cleanInt(string &$int) {
        $int = preg_replace('/[^0-9]/', '', $int);
        if($int == null || $int == '')
        {
            return null;
        }
        return intval($int);
    }
}
?>