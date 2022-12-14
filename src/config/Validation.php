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

    static function val_form_add(string &$nom,string &$description,&$dVueEreur) {
        $nom = Validation::cleanText($nom);
        if ($nom == NULL) {
            $dVueEreur['nom'] =  "Veuillez entrer un nom*";
        }
        $description = Validation::cleanText($description);
        if ($description == NULL) {
            $dVueEreur['description'] =  "Veuillez entrer une description*";
        }
        if(count($dVueEreur)>0){
            throw new Exception("Problème lors de l'ajout");
        }


    }

    static function cleanText(string &$txt) {
        $txt = preg_replace('/[^A-Za-z\-\^0-9\ ]/', '',  $txt);
        if($txt == null || $txt == '')
        {
            return null;
        }
        return $txt;
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