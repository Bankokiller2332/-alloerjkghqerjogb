<?php

include_once __DIR__ . "/../../UTILS/connector.php";

class UserTDG extends DBAO{

    private $tableName;
    private static $instance = null;

    public function __construct(){
        Parent::__construct();
        $this->tableName = "usager";
    }
    public static function get_instance(){
        if(self::$instance == null){
            self::$instance = new UserTDG();
        }
        return self::$instance;    
    }

    public function createTable(){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "CREATE TABLE IF NOT EXISTS $tableName (id INTEGER(10) AUTO INCREMENT PRIMARY KEY,
            email VARCHAR(25) UNIQUE NOT NULL,
            username VARCHAR(25) NOT NULL,
            password VARCHAR(250) NOT NULL)";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }

        //error catch and msg display
        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }


    //drop table
    public function drop_table(){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "DROP TABLE $tableName";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $resp = true;
        }

        //error catch and msg display
        catch(PDOException $e)
        {
            $resp = false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }


    public function get_by_id($id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT usagerID, email, username, imageProfil FROM $tableName WHERE usagerID=:id";
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


    public function get_by_email($email){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE email=:email";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
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


    public function get_by_username($username){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE username=:username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
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


    public function get_all_users(){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT usagerID, email, username FROM $tableName";
            $stmt = $conn->prepare($query);
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


    public function add_user($email, $username, $password, $path){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "INSERT INTO $tableName (email, username, password, imageProfil) VALUES (:email, :username, :password, :path)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':path', $path);
            $stmt->execute();
            $resp =  true;
        }

        catch(PDOException $e)
        {
            $resp =  false;
        }
        //fermeture de connection PDO
        $conn = null;
        return $resp;
    }


    /*
      update juste pour les infos non sensibles
    */
    public function update_info($email, $username, $id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET email=:email, username=:username WHERE usagerID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
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

    /*
      update juste pour le password
    */
    public function update_password($NHP, $id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET password=:password WHERE usagerID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':password', $NHP);
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

    public function update_photo($newUrl,$id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "UPDATE $tableName SET imageProfil=:newUrl WHERE usagerID=:id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':newUrl', $newUrl);
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

    public function url_by_id($id){

        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT imageProfil FROM $tableName WHERE usagerID=:id";
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

    public function search_user_name_like($userName){
        try{
            $conn = $this->connect();
            $tableName = $this->tableName;
            $query = "SELECT * FROM $tableName WHERE username LIKE :userName";
            $stmt = $conn->prepare($query);
            $userName = '%' . $userName . '%';
            $stmt->bindParam(':userName', $userName);
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

