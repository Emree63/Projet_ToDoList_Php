<?php
class ListeGateway{
    private $con;

    public  function __construct(){
        global $dsn,$user,$pass;
        $this->con=new Connection($dsn,$user,$pass);
    }

    public function Ajouter(string $nom, string $description, bool $estPublic, string $createur){
        $query='INSERT INTO ToDoList_Liste(nom, description, dateCreation,estPublic, idUtilisateur) VALUES(:nom,:description,CURRENT_DATE, :estPublic, :createur);';
        $this->con->executeQuery($query, array(
                                        'nom' => array($nom, PDO::PARAM_STR),
                                        'description' => array($description, PDO::PARAM_STR),
                                        'estPublic' => array($estPublic, PDO::PARAM_INT),
                                        'createur' => array($createur, PDO::PARAM_STR),
                                    ));
    }

    public function Editer(string $id, string $nom, string $description){
        $query='UPDATE ToDoList_Liste SET nom=:nom, description=:description WHERE id=:id;';
        $this->con->executeQuery($query, array(
            'nom' => array($nom, PDO::PARAM_STR),
            'description' => array($description, PDO::PARAM_STR), 
            'id' => array($id,PDO::PARAM_INT))
        );
    }

    public function EditerNom(string $id, string $nom){
        $query='UPDATE ToDoList_Liste SET nom=:nom WHERE id=:id;';
        $this->con->executeQuery($query, array('nom' => array($nom, PDO::PARAM_STR),'id' => array($id, PDO::PARAM_INT)));

    }

     public function EditerDescription(string $id, string $description){
        $query='UPDATE ToDoList_Liste SET description=:description WHERE id=:id;';
        $this->con->executeQuery($query, array('description' => array($description, PDO::PARAM_STR), 'id' => array($id, PDO::PARAM_INT)));
    }

    public function Supprimer(string $id){
        $query="DELETE FROM ToDoList_Liste WHERE id=:id";
        $this->con->executeQuery($query,array('id' => array($id, PDO::PARAM_INT)));
    }

    public function getListe(int $offset, int $limit){
        $query = "SELECT * FROM ToDoList_Liste LIMITS $offset,$limit"; 
        $this->con->executeQuery($query);
        $listes=$this->con->getResults();
        return $listes;
    }

    public function getListePublic($offset,$limit){
        $query = "SELECT * FROM ToDoList_Liste WHERE estPublic LIMIT $offset, $limit"; 
        $this->con->executeQuery($query);
        $listes = [];
        foreach ($this->con->getResults() as $liste) {
            $listes[] = new Liste($liste["id"],$liste["nom"],$liste["description"],$liste["dateCreation"],$liste["estPublic"],$liste["idUtilisateur"]);
        }
        return $listes;
    }

    public function getListePrive($offset,$limit){
        $query = "SELECT * FROM ToDoList_Liste WHERE !estPublic LIMIT $offset, $limit"; 
        $this->con->executeQuery($query);
        $listes = [];
        foreach ($this->con->getResults() as $liste) {
            $listes[] = new Liste($liste["id"],$liste["nom"],$liste["description"],$liste["dateCreation"],$liste["estPublic"],$liste["idUtilisateur"]);
        }
        return $listes;
    }
}
?>