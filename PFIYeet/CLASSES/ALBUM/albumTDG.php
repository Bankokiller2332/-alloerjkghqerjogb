<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class AlbumTDG extends DBAO{

    private $tableName;
    private static $instance =null;

    public function __construct(){
        Parent::__construct();
        $this->tableName = "album";
    }

    //create table
    public function createTable(){

        try{
            $conn = $this->connect();
            $query = "CREATE TABLE IF NOT EXISTS ". $this->tableName ." (id INTEGER(10) AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(25) UNIQUE NOT NULL)";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }

        //error catch
        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }


    //drop table
    public function dropTable(){

        try{
            $conn = $this->connect();
            $query = "DROP TABLE ". $this->tableName;
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }

        //error catch
        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }

    public function get_all_albums_by_id($userid){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM $this->tableName where proprietaire = (select username from usager where usagerID = :id)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $userid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        //error catch
        catch(PDOException $e)
        {
            $result = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }
    public function get_all_albums(){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM $this->tableName";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $userid);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }

        //error catch
        catch(PDOException $e)
        {
            $result = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }



    public function get_by_ID($id){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE albumid=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e)
        {
            return false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function get_by_title($title){

        try{
            $conn = $this->connect();
            $query = "SELECT * FROM ". $this->tableName ." WHERE titre=:title";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
        }

        catch(PDOException $e)
        {
            return false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $result;
    }

    public function add_album($title, $proprietaire, $description){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (titre, proprietaire, description, tempsCreation) VALUES (:title, :proprietaire, :description,CURRENT_TIME)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':proprietaire', $proprietaire);
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


 /*public function get_all_posts_by_threadID($id){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE threadID=:id";
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
    }*/

    public function search_album_title_like($title){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE titre LIKE :title";
            $stmt = $conn->prepare($query);
            $title = '%' . $title . '%';
            $stmt->bindParam(':title', $title);
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
}
