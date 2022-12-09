<?php

class CtrlVisiteur {

	function __construct() {

		global $rep,$vues; 
		
		$dVueEreur = array ();

		try{
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}

			switch($action) {

				//pas d'action, on réinitialise 1er appel
				case NULL:
					$this->ConsulterListePublic($dVueEreur);
					break;

				case "validationFormulaire":
					$this->ValidationFormulaire($dVueEreur);
					break;

				case "seConnecter":
					$this->seConnecter($dVueEreur);
					break;

				case "redirectionListePublic":
					$this->ConsulterListePublic($dVueEreur);
					break;

				case "redirectionLogin":
					$this->redirectionLogin($dVueEreur);
					break;

				case "redirectionInscription":
					$this->redirectionInscription($dVueEreur);
					break;

				case "SupprimerTache":
					$this->SupprimerTache();
					break;

				case "SupprimerListe":
					$this->SupprimerListe();
					break;

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['home']);
					break;
				}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur BD!!! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
		{
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}


		//fin
		exit(0);
	}//fin constructeur

	function ValidationFormulaire(array $dVueEreur) {
		global $rep,$vues; 
		Mdl::CreerUtilisateur();
		$action=NULL;
		$this->redirectionLogin($dVueEreur);
	}

	function redirectionLogin(array $dVueEreur) {
		global $rep,$vues; 
		require ($rep.$vues['login']);
	}

	function redirectionInscription(array $dVueEreur) {
		global $rep,$vues; 
		require ($rep.$vues['inscription']);
	}

	function seConnecter(array $dVueEreur) {
		global $rep,$vues; 
		MdlVisiteur::Connection();
		$action=NULL;
		$this->ConsulterListePublic($dVueEreur);
	}

	function ConsulterListePublic(array $dVueEreur) {
		global $rep,$vues; 
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		require ($rep.$vues['listPublic']);
	}

	function SupprimerTache(){
		global $rep,$vues; 
		$id = $_GET['idTache'];
		$tache = MdlVisiteur::SupprimerTache($id);
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		require ($rep.$vues['listPublic']);

	}

	function SupprimerListe(){
		global $rep,$vues; 
		$id = $_GET['idListe'];
		$liste = MdlVisiteur::SupprimerListe($id);
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		require ($rep.$vues['listPublic']);

	}
}//fin class

?>
