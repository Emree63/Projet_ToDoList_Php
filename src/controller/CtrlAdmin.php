<?php

class CtrlAdmin {

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
					$this->ConsulterUtilisateurs($dVueErreur);
					break;

				case "redirectionVueUtilisateur":
					$this->ConsulterUtilisateurs($dVueErreur);
					break;
				
				case "SupprimerUtilisateur":
					$this->SupprimerUtilisateur($dVueErreur);
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

	public function ConsulterUtilisateurs(array $dVueErreur){
		global $rep,$vues; 
		$users = MdlAdmin::recupererUtilisateur();
		$action=NULL;
		require ($rep.$vues['users']);
	}

	public function SupprimerUtilisateur(array $dVueErreur){
		global $rep,$vues; 
		$users = MdlAdmin::supprimerUtilisateur();
		$this->ConsulterUtilisateurs($dVueErreur);
	}

}//fin class

?>
