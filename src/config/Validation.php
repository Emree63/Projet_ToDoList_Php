<?php

namespace config;

class Validation {

    static function val_form_user(string &$nom, string &$prenom, string &$pseudo, string &$mdp, string &$email, &$dVueEreur) {

        $i=0;
        //Vérification Nom
        if (!isset($nom)||$nom=="") {
            $dVueEreur[] =	"pas de nom";
            $nom="";
            $i++;
        }

        val_string($Nom,$i,$dVueEreur);

        //Vérification Prenom
        if (!isset($prenom)||$prenom=="") {
            $dVueEreur[] =	"pas de prenom";
            $pseudo="";
            $i++;
        }

        val_string($prenom,$i,$dVueEreur);

        //Vérification Email
        if (!isset($email)||$email=="") {
            $dVueEreur[] =	"pas de email";
            $pseudo="";
            $i++;
        }

        if ($email != filter_var($email, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $nom="";
            $i++;
        }

        val_string($email,$i,$dVueEreur);

        //Vérification Pseudo
        if (!isset($pseudo)||$pseudo=="") {
            $dVueEreur[] =	"pas de pseudo";
            $pseudo="";
            $i++;
        }

        val_string($pseudo,$i,$dVueEreur);

        //Vérification Mot de Passe
        if (!isset($mdp)||$mdp=="") {
            $dVueEreur[] =	"pas de mot de passe";
            $mdp="";
            $i++;
        }

        val_string($mdp,$i,$dVueEreur);


        if (!preg_match('/^.{5,}$/', $mdp)) {
            $dVueEreur[] =	"Mot de passe trop léger : Plus de 5 caractères minimum  !";
            $i++;
        }

        if($i>0){
            return false;
        }
        return true;

    }

    static function val_string(string &$str, int &$i ,&$dVueEreur) {
        if ($str != filter_var($str, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] =	"tentative d'injection de code (attaque sécurité)";
            $str="";
            $i++;
        }
    }

}
?>