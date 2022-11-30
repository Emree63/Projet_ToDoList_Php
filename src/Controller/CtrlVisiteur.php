<?php

namespace Controller;

class Controleur {

function __construct() {
	global $rep,$vues; 
	session_start();

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

		case "redirectionLogin":
			$this->redirectionLogin($dVueEreur);
			break;

		case "redirectionInscription":
			$this->redirectionInscription($dVueEreur);
			break;

		case "seConnecter":
			$this->seConnecter($dVueEreur);
			break;

		case "ConsulterListe":
			$this->ConsulterListe();
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
		require ($rep.$vues['Home']);
	}

	function ValidationFormulaire(array $dVueEreur) {
		require ($rep.$vues['inscription']);
	}


	function redirectionLogin(array $dVueEreur) {
		require ($rep.$vues['login']);
	}

	function redirectionInscription(array $dVueEreur) {
		require ($rep.$vues['inscription']);
	}

	function seConnecter(array $dVueEreur) {
		require ($rep.$vues['login']);
	}

	function ConsulterListe(){
		require ($rep.$vues['listeVue']);
	} 


}//fin class

?>
