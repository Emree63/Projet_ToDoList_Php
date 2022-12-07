<?php
class FrontControleur {

    function __construct(){
		session_start();
		try {
			// $string_actor=' ';
			// $listeActions=array(
			// 	'Utilisateur' => array('fqds','fdqs'),
			// 	'Admin' => array()
			// );

			// //On récupère l'action
			// $action=$_REQUEST['action'];

			// //On vérifie si l'action fait partie des listes d'actions
			// $string_actor=fct($action,$listeActions);
			// if($string_actor!=NULL){
			// 	$mdl=new mdl.$string_actor;
			// 	$actor=$mdl.isMdl;
			// 	if($actor==NULL){
			// 		require('login'.$string_actor);
			// 	}
			// 	else{
			// 		$ctrl=new Ctrl.$string_actor ;

			// 	}
			// }	
			// else 
			new CtrlVisiteur();


		} catch (Exception $e) {
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}

    }
}
?>
