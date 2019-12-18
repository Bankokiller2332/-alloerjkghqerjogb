<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class commentTDG extends DBAO{

    private $tableName;
    private static $instance = null;

    public function __construct(){
        Parent::__construct();
        $this->tableName = "commentaire";
    }

    /*public static function getInstance(){
        if(!is_null(self::$instance)){
            return self::$instance;
        }
        __construct();
        return self::$instance;
    }*/
    public function add_comment($typeObjet, $auteurID, $content, $targetID)
    {
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (typeObjet, tempsCreation,auteurID, contenu, targetID) 
            VALUES (:typeObjet,CURRENT_TIME(),:auteurID,:content, :targetID)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':auteurID', $auteurID);
            $stmt->bindParam(':typeObjet', $typeObjet);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':targetID', $targetID);
            $stmt->execute();
            $resp = true;
        }

        catch(PDOException $e)
        {
            var_dump($e);
            $resp =  false;
        }
        var_dump($resp);
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }

    public function edit_comment($content, $id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET contenu=:content WHERE commentaireID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $resp = true;
        }

        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }

    public function get_by_ID($id){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE commentaireID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function get_all_comment_by_targetID($targetID){
        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE targetID=:targetID";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':targetID', $targetID);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }
    public function delete_comment_by_id($id){  
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DELETE from $tableName where commentaireID =:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);       
            $stmt->execute();
            $res = true;
        }
        catch(PDOException $e)
        {
            $res = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $res;
    }
}
