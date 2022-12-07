<?php

class CtrlAdmin {

	function __construct() {

		global $rep,$vues; 
		
		$dVueEreur = array ();

		try{
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}

			switch($action) {

				
				case NULL:
					$this->($dVueEreur);
					break;

				

				
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

}//fin class

?>
