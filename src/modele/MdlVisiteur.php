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
        $listGtw = new ListeGateway(); 
        if(isset($_SESSION["page"]))
            return $listGtw->getListePublic(($_SESSION["page"]-1)*5,5);
        else
            return $listGtw->getListePublic(1,10);
    }

    public static function RecupererTache(){
        $taskGtw = new TacheGateway();
        return $taskGtw->getTache();
    }

    public static function SupprimerTache(){
        $taskGtw = new TacheGateway();
        $id = $_GET['idTache'];
        $taskGtw->Supprimer($id);
    }

    public static function SupprimerListe(){
        $listGtw = new ListeGateway();
        $taskGtw = new TacheGateway();
        $id = $_GET['idListe'];
        $taskGtw->SupprimerViaListe($id);
        $listGtw->Supprimer($id);
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
        $listGtw = new ListeGateway();
        $id = $_POST['idListe'];
        $nom = Validation::cleanText($_POST['nom-modif-liste']);
        $description = Validation::cleanText($_POST['description-modif-liste']);

        if($nom == NULL && $description==null){
            return null;
        }
        if($description == NULL){
            $listGtw->EditerNom($id, $nom);
        }
        else if($nom == NULL){
            $listGtw->EditerDescription($id, $description);
        }
        else{
             $listGtw->Editer($id, $nom, $description);
        }  
    }

    public function AjouterListePublic(&$dVueErreur){
        $listGtw = new ListeGateway();
        $nom=$_POST['nom-ajout-liste'];
        $description=$_POST['description-ajout-liste'];
        Validation::val_form_add($nom,$description,$dVueErreur);
        $listGtw->Ajouter($nom, $description,1, 1);
    }

    public static function check(){
        $taskGtw = new TacheGateway();
        $id = Validation::cleanInt($_POST['idTache']);
        $taskGtw->isDone($id);
    }


}
