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
    public function add_comment($typeObjet, $auteurID, $id, $content)
    {
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (commentaireID, typeObjet, tempsCreation,auteurID, contenu) 
            VALUES (:commentaireID,:typeObjet,CURRENT_TIME(),:auteurID,:content)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':auteurID', $auteurID);
            $stmt->bindParam(':typeObjet', $typeObjet);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':commentaireID', $id);
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


}