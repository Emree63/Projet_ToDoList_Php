<?php
class FrontControleur {

    function __construct(){
		global $rep,$vues; 
		session_start();
		setcookie('page', 1, time() + 24*3600);
		try {
			
			$string_actor=' ';
			$listeActions=array(
				'Utilisateur' => array('logout','redirectionProfil','supprimerCompte','modifMdp'),
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
		} catch (PDOException $e)
		{
			//si erreur BD, pas le cas ici
			$dVueErreur[] =	"Erreur: Connexion a la base de données impossible! ";
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