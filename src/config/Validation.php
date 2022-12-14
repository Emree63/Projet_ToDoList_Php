<?php

class Validation {

    static function val_form_user(string &$nom, string &$prenom, string &$pseudo, string &$mdp, string &$email, &$dVueErreur) {

        //Vérification Nom
        $nom = Validation::val_string($nom);
        if ($nom == NULL) {
            $dVueErreur['nom'] = "Le nom ne peut pas comporter de caractère spécial*";
        }else if(strlen($nom)<3){
            $dVueErreur['nom'] = "Le nom doit comporter au moins 3 caractères*";
        }

        //Vérification Prenom
        $prenom = Validation::val_string($prenom);
        if ($prenom == NULL) {
            $dVueErreur['prenom'] =	"Le prenom ne peut pas comporter de caractère spécial*";
        }else if(strlen($prenom)<3){
            $dVueErreur['prenom'] = "Le prenom doit comporter au moins 3 caractères*";
        }

        //Vérification Email
        $email = Validation::val_mail($email);
        if ($email == NULL) {
            $dVueErreur['mail'] = "Format du mail non-respecter*";
        }
        

        //Vérification Pseudo
        $pseudo = Validation::val_string($pseudo);
        if ($pseudo == NULL) {
            $dVueErreur['pseudo'] =	"Le pseudo ne peut pas comporter de caractère spécial*";
        }else if(strlen($pseudo)<5){
            $dVueErreur['pseudo'] = "Le pseudo doit comporter au moins 5 caractères*";
        }


        if (!preg_match('/^.{5,}$/', $mdp)) {
            $dVueErreur['password'] = "Mot de passe trop léger : Plus de 5 caractères minimum  !";
        }

        if(count($dVueErreur)>0){
             throw new Exception("Erreur lors de l'inscription*");
        }

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

    static function val_string(string &$str) {
        if(filter_var($str, FILTER_SANITIZE_STRING)!=$str)
        {
            return null;
        }
        return $str;
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