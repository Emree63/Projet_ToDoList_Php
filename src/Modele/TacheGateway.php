<?php
class TacheGateway{
	private $con;
  	public  function __construct(Connection $con){
        $this->con=$con;
    }

    public function Ajouter($nom, $description, Date $dateCreation, Utilisateur $createur){
    	$query='INSERT INTO Tache VALUES($nom, $description, dateCreation, $createur)';

    }

    public function Editer(Tache $tache, string $nom, string $description){
    	$query='UPDATE Tache SET  :nom=$nom, :description=$description';
    	$this->con->executeQuery($query, array('nom' => array($tache->nom, PDO::PARAM_STRING)), array('description' => array($tache->description, PDO::PARAM_STRING)));
    }


    public function Supprimer(Tache $tache){
        $query='DELETE FROM Tache WHERE utilisateur=:utilisateur AND nom=:nom';
        $this->con->executeQuery($query, array('utilisateur' => array($tache->createur, PDO::PARAM_INT),'nom' => array($tache->nom, PDO::PARAM_STRING)));
    }
}
?>