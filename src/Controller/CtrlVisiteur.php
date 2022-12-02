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
					$this->Reinit();
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

				//mauvaise action
				default:
					$dVueEreur[] =	"Erreur d'appel php";
					require ($rep.$vues['home']);
					break;
				}

		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueEreur[] =	"Erreur inattendue!!! ";
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


	function Reinit() {
		global $rep,$vues; 
		require ($rep.$vues['listPublic']);
	}

	function ValidationFormulaire(array $dVueEreur) {
		global $rep,$vues; 
		Modele::CreerUtilisateur();
		require ($rep.$vues['login']);
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
		require ($rep.$vues['login']);
	}

	function ConsulterListePublic(array $dVueEreur) {
		global $rep,$vues; 
		Modele::RecupererListePublic();
		require ($rep.$vues['listPublic']);
	}



	}//fin class

?>