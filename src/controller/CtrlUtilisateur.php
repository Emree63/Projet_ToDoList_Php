<?php

class CtrlUtilisateur {

	function __construct() {

		global $rep,$vues; 
		
		$dVueErreur = array ();

		try{
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}

			switch($action) {

				
				case NULL:
					$this->ConsulterListePrive($dVueErreur);
					break;

				case "logout":
					$this->SeDeconnecter($dVueErreur);
					break;

				case "redirectionProfil":
					$this->redirectionProfil($dVueErreur);
					break;

				case "supprimerCompte":
					$this->supprimerCompte($dVueErreur);
					break;
					
				case "modifMdp":
					$this->changerMotDePasse($dVueErreur);
					break;

				case "listePrive":
					$this->ConsulterListePrive($dVueErreur);
					break;

				case "SupprimerTachePrive":
					$this->SupprimerTachePrive($dVueErreur);
					break;

				case "AjouterTachePrive":
					$this->AjouterTachePrive($dVueErreur);
					break;

				case "ModifierListePrive":
					$this->ModifierListePrive($dVueErreur);
					break;

				case "checkPrive":
					$this->checkPrive($dVueErreur);
					break;

				case "AjouterListePrive":
					$this->AjouterListePrive($dVueErreur);
					break;

				case "SupprimerListePrive":
					$this->SupprimerListePrive($dVueErreur);
					break;

				default:
					$dVueErreur[] =	"Erreur d'appel php";
					require ($rep.$vues['erreur']);
					break;
				}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueErreur[] =	"Erreur BD!!! ";
			require ($rep.$vues['erreur']);

		}
		catch (Exception $e2)
		{
			$dVueErreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}


		//fin
		exit(0);
	}//fin constructeur

	function SeDeconnecter(array $dVueErreur){
		global $rep,$vues; 
		MdlUtilisateur::déconnexion();
		$action=NULL;
		require ($rep.$vues['login']);
	}

	function redirectionProfil(array $dVueErreur){
		global $rep,$vues; 
		$action=NULL;
		$user=MdlUtilisateur::isConnected();
		$nombreListe=MdlUtilisateur::recupererNombreDeListe();
		require ($rep.$vues['profil']);
	}

	function supprimerCompte(array $dVueErreur){
		global $rep,$vues; 
		$action=NULL;
		MdlUtilisateur::suppressionUtilisateur();
		require ($rep.$vues['login']);
	}

	function changerMotDePasse(array $dVueErreur){
		global $rep,$vues; 
		try{
			MdlUtilisateur::changerMotDePasse();
			$action=NULL;
			require ($rep.$vues['login']);
		}
		catch(Exception $e)
		{
			$dVueErreur[] =	$e->getMessage();
			require ($rep.$vues['erreur']);
		}	
		
	}

	function ConsulterListePrive(array $dVueErreur) {
		global $rep,$vues; 
		$listesPrive = MdlUtilisateur::RecupererListePrive();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPrive']);
	}

	function SupprimerTachePrive(array $dVueErreur){
		global $rep,$vues; 
		$tache = MdlVisiteur::SupprimerTache();
		$this->ConsulterListePrive($dVueErreur);
	}

	function SupprimerListePrive(array $dVueErreur){
		global $rep,$vues; 
		$liste = MdlVisiteur::SupprimerListe();
		$this->ConsulterListePrive($dVueErreur);

	}

	public function AjouterTachePrive(array $dVueErreur){
		global $rep,$vues; 
		try{
			$tache = MdlVisiteur::AjouterTache($dVueErreur);
			$this->ConsulterListePrive($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			$listesPrive= MdlUtilisateur::RecupererListePrive();
			$taches = MdlVisiteur::RecupererTache();
			$action=NULL;
			require ($rep.$vues['listPrive']);
		}	
	}


	public function ModifierListePrive(array $dVueErreur){
		global $rep,$vues;
		try{
			$tache = MdlVisiteur::ModifierListe($dVueErreur);
			$this->ConsulterListePrive($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			$listesPrive= MdlUtilisateur::RecupererListePrive();
			$taches = MdlVisiteur::RecupererTache();
			$action=NULL;
			require ($rep.$vues['listPublic']);
		}	 
	}

	public function checkPrive(array $dVueErreur)
	{
		global $rep,$vues;
		$tache = MdlVisiteur::check();
		$this->ConsulterListePrive($dVueErreur);
	}

	public function AjouterListePrive(array $dVueErreur){
		global $rep,$vues; 

		try{
			$tache = MdlUtilisateur::AjouterListePrive($dVueErreur);
			$this->ConsulterListePrive($dVueErreur);
		}	
		catch (Exception $e)
		{
			$ErreurLog=$e->getMessage();
			$listes = MdlUtilisateur::RecupererListePrive();
			$taches = MdlVisiteur::RecupererTache();
			$action=NULL;
			require ($rep.$vues['listPrive']);
		}	
		
	}

	
	public function listePrécédente(array $dVueErreur){
		if($_COOKIE['pageUser'] > 1){
			setcookie('pageUser', $_COOKIE['pageUser'] - 1, time() + 24*3600);
		}
		$this->ConsulterListePrive($dVueErreur);
	}

	public function listeSuivante(array $dVueErreur){
		setcookie('pageUser', $_COOKIE['pageUser'] + 1, time() + 24*3600);
		$this->ConsulterListePrive($dVueErreur);
	}

}//fin class

?>
