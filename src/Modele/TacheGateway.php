<?php
class TacheGateway{
	private $con;
  	public  function __construct(){
        $this->con=new Connection($dsn,$user,$pass);
    }

    public function Ajouter(string $nom, string $description, Date $dateCreation, bool $estValide, int $idCreateur){
    	$query='INSERT INTO ToDoList_Tache(nom, description, dateCreation,estValide, createur) VALUES(:nom, :description, :dateCreation, :estValide, :idCreateur)';
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STRING)),
        array('description' => array($description, PDO::PARAM_STRING)),
        array('dateCreation' => array($dateCreation, PDO::PARAM_STRING)),
        array('estValide' => array($estValide, PDO::PARAM_BOOL)),
        array('idCreateur' => array($idCreateur, PDO::PARAM_INT)));
    }

    public function Editer(Tache $tache, string $nom, string $description){
    	$query='UPDATE ToDoListe_Tache SET  nom=:nom, description =:description WHERE id=:id';
    	$this->con->executeQuery($query, array('nom' => array($tache->getNom(), PDO::PARAM_STRING)), array('description' => array($tache->getdescription(), PDO::PARAM_STRING)), array('id' => array($tache->getId(),PDO::PARAM_INT)));
    }

    public function Supprimer(Tache $tache){
        $query='DELETE FROM ToDoList_Tache WHERE id=:id';
        $this->con->executeQuery($query,'id' => array($tache->getId(), PDO::PARAM_STRING));
    }
}
?>