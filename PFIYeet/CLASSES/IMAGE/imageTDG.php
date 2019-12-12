<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class imageTDG extends DBAO{

    private $tableName;
    private static $instance = null;

    public function __construct(){
        Parent::__construct();
        $this->tableName = "image";
    }

    public static function get_instance(){
        if(is_null(self::$instance)){
            self::$instance = new imageTDG();
        }
        return self::$instance;    
    }

    public function get_images_by_albumID($id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE albumID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        catch(PDOException $e)
        {
            return false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function add_Image($url, $albumID, $description){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (URL, albumID, description, tempsCreation) VALUES (:url, :albumID, :description,CURRENT_TIME)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':albumID', $albumID);
            $stmt->bindParam(':description', $description);
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