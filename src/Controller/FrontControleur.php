<?php
class FrontControleur {

    function __construct(){
		session_start();
		try {
			$controlleur = new CtrlVisiteur();

		} catch (Exception $e) {
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}

    }
}
?>
