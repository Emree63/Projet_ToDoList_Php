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
			// $string_actor=quelListe($action,$listeActions);
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
			echo "coucou";

		} catch (Exception $e) {
			$dVueEreur[] =	"Erreur inattendue!!! ";
			require ($rep.$vues['erreur']);
		}
    }

	public static function quelListe($action,$listeActions){
		foreach($listeActions as $a){
			if(in_array($action, $a)){
				return array_search($a,$listeActions);
			}
		}
		return null;
	}
	
}
?>
