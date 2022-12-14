<?php

class CtrlVisiteur {

	function __construct() {

		global $rep,$vues; 
		
		$dVueErreur = array ();

		try{
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}

			switch($action) {

				//pas d'action, on réinitialise 1er appel
				case NULL:
					$this->ConsulterListePublic($dVueErreur);
					break;

				case "validationFormulaire":
					$this->ValidationFormulaire($dVueErreur);
					break;

				case "seConnecter":
					$this->seConnecter($dVueErreur);
					break;

				case "redirectionListePublic":
					$this->ConsulterListePublic($dVueErreur);
					break;

				case "redirectionLogin":
					$this->redirectionLogin($dVueErreur);
					break;

				case "redirectionInscription":
					$this->redirectionInscription($dVueErreur);
					break;

				case "SupprimerTache":
					$this->SupprimerTache($dVueErreur);
					break;

				case "SupprimerListe":
					$this->SupprimerListe($dVueErreur);
					break;

				case "AjouterTache":
					$this->AjouterTache();
					break;

				case "AjouterListePublic":
					$this->AjouterListePublic($dVueErreur);
					break;

				case "ModifierListe":
					$this->ModifierListe();
					break;

				case "check":
					$this->check();
					break;

				//mauvaise action
				default:
					$dVueErreur[] =	"Erreur d'appel php";
					require ($rep.$vues['erreur']);
					break;
				}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueErreur[] =	"Erreur: Connexion a la base de données impossible! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e)
		{
			$dVueErreur[] =	"Erreur venue de nulle part";
			require ($rep.$vues['erreur']);
		}


		//fin
		exit(0);
	}//fin constructeur

	function ValidationFormulaire(array $dVueErreur) {
		global $rep,$vues; 

		try{
			$val = MdlVisiteur::CreerUtilisateur($dVueErreur);
			$result=MdlUtilisateur::Connection();
			$action=NULL;
			$this->ConsulterListePublic($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			require ($rep.$vues['inscription']);
		}
		catch (PDOException $e)
		{
			$ErreurLog=$e->getMessage();
			require ($rep.$vues['inscription']);
		}
	}

	function redirectionLogin(array $dVueErreur) {
		global $rep,$vues; 
		require ($rep.$vues['login']);
	}

	function redirectionInscription(array $dVueErreur) {
		global $rep,$vues; 
		require ($rep.$vues['inscription']);
	}

	function seConnecter(array $dVueErreur) {
		global $rep,$vues; 
		try{
			$result=MdlUtilisateur::Connection();
			$action=NULL;
			$this->ConsulterListePublic($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			require ($rep.$vues['login']);
		}
		
	}

	function ConsulterListePublic(array $dVueErreur) {
		global $rep,$vues; 
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

	function SupprimerTache(array $dVueErreur){
		global $rep,$vues; 
		$tache = MdlVisiteur::SupprimerTache();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

	function SupprimerListe(array $dVueErreur){
		global $rep,$vues; 
		$liste = MdlVisiteur::SupprimerListe();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}


	public function AjouterTache(){
		global $rep,$vues; 
		$tache = MdlVisiteur::AjouterTache();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

	public function AjouterListePublic(array $dVueErreur){
		global $rep,$vues; 

		try{
			$tache = MdlVisiteur::AjouterListePublic($dVueErreur);
			$this->ConsulterListePublic($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			$listes = MdlVisiteur::RecupererListePublic();
			$taches = MdlVisiteur::RecupererTache();
			$action=NULL;
			require ($rep.$vues['listPublic']);
		}	
		
	}

	public function ModifierListe(){
		global $rep,$vues; 
		$tache = MdlVisiteur::ModifierListe();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

	public function check()
	{
		global $rep,$vues;
		$tache = MdlVisiteur::check();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}
}//fin class

?>

