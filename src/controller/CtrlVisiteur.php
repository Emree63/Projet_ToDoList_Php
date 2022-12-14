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

				case "AjouterTache":
					$this->AjouterTache();
					break;

				case "AjouterListePublic":
					$this->AjouterListePublic($dVueEreur);
					break;

				case "ModifierListe":
					$this->ModifierListe();
					break;

				case "check":
					$this->check();
					break;

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['listPublic']);
					break;
				}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur: Connexion a la base de données impossible! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e)
		{
			$dVueEreur[] =	"Erreur venue de nulle part";
			require ($rep.$vues['erreur']);
		}


		//fin
		exit(0);
	}//fin constructeur

	function ValidationFormulaire(array $dVueEreur) {
		global $rep,$vues; 
		$val = MdlVisiteur::CreerUtilisateur();
		if($val==null){
			$this->redirectionInscription($dVueEreur);
		}else {
			$action=NULL;
			$this->redirectionLogin($dVueEreur);
		}

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
		try{
			$result=MdlUtilisateur::Connection();
			$action=NULL;
			$this->ConsulterListePublic($dVueEreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			require ($rep.$vues['login']);
		}
		
	}

	function ConsulterListePublic(array $dVueEreur) {
		global $rep,$vues; 
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

	function SupprimerTache(){
		global $rep,$vues; 
		$tache = MdlVisiteur::SupprimerTache();
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);

	}

	function SupprimerListe(){
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
