<?php
class FrontControleur {

    function __construct(){
		session_start();
		try {
			global $rep,$vues; 
			$string_actor=' ';
			$listeActions=array(
				'Utilisateur' => array('logout','redirectionProfil','supprimerCompte'),
				'Admin' => array()
			);

			//On récupère l'action
			$action=NULL;
			if(isset($_REQUEST['action'])){
				$action = $_REQUEST["action"];
			}

			//On vérifie si l'action fait partie des listes d'actions
			$string_actor=FrontControleur::quelListe($action,$listeActions);
			if($string_actor!=NULL){
				$class= 'Mdl'.$string_actor;
				$mdl=new $class();
				$actor=$mdl->isConnected();
				if($actor==NULL){
					require($rep.$vues['login']);
				}
				else{
					$ctrl='Ctrl'.$string_actor;
					new $ctrl();

				}
			}	
			else 
				new CtrlVisiteur();

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
