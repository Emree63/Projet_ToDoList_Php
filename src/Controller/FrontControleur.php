<?php
class FrontController {
	global $rep,$vues; 

    function __construct(){
		session_start();
		try {
			$actionUser = array();
			if(isset($_GET["action"]) and in_array($_GET["action"],$actionUser))
				if(!isset($_SESSION["IdUserCourant"])){
					require("views/login.php");
				} else $controlleur = new CtrlUtilisateur();
			else $controlleur = new CtrlVisiteur();

		} catch (Exception $e) {
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}

    }
}
?>
