<?php
class ListeGateway{
	private $con;

  	public  function __construct(Connection $con){
        $this->con=$con;
    }

    public function Ajouter(string $nom,  Date $dateCreation, bool $estValide, int $idCreateur, bool $estPublic){
    	$query='INSERT INTO ToDoList_Liste(nom, dateCreation,estValide, createur, estPublic) VALUES(:nom, :dateCreation, :estValide, :idCreateur, :estPublic)';
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STRING)),
        array('dateCreation' => array($dateCreation, PDO::PARAM_STRING)),
        array('estValide' => array($estValide, PDO::PARAM_BOOL)),
        array('idCreateur' => array($idCreateur, PDO::PARAM_INT)),
        array('estPublic' => array($estPublic, PDO::PARAM_INT))
    )
    }

    public function Editer(Liste $Liste, string $nom,){
    	$query='UPDATE ToDoListe_Liste SET  nom=:nom WHERE id=:id';
    	$this->con->executeQuery($query, array('nom' => array($Liste->getNom(), PDO::PARAM_STRING)), array('id' => array($Liste->getId()),PDO::PARAM_INT));
    }

    public function Supprimer(int $id){
        $query='DELETE FROM ToDoListe_Liste WHERE id=:id';
        $this->con->executeQuery($query,'id' => array($id, PDO::PARAM_STRING)));
    }

    public function getListe(int $offset, int $limit){
        $query = "SELECT * FROM ToDoListe_Liste LIMITS $offset,$limit"; 
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results;
    }

    public function getTacheListe(Liste $liste){
        $query = 'SELECT tache FROM ToDoListe_Liste WHERE id=:id ';
        $this->con->executeQuery($query, array('id' => array($liste->getId, PDO::PARAM_INT)));
        $results=$this->con->getResults();
        return $results;
    }

    public function getListePublic($offset,$limit){
        $query = "SELECT * FROM ToDoListe_Liste AND estPublic LIMITS $offset,$limit"; 
        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        return $results;
    }
}
?>