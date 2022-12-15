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
					$this->ConsulterListePublic($dVueErreur);
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

	function ConsulterListePublic(array $dVueErreur) {
		global $rep,$vues; 
		$listes = MdlVisiteur::RecupererListePublic();
		$taches = MdlVisiteur::RecupererTache();
		$action=NULL;
		require ($rep.$vues['listPublic']);
	}

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

}//fin class

?>
