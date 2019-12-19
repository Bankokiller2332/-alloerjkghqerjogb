<?php
include_once __DIR__ . "/userTDG.PHP";

class User{

    private $id;
    private $email;
    private $username;
    private $imgUrl;
    private $password;

    /*
        utile si on utilise un factory pattern
    */
    public function __construct(){
        //$this->id = $id;
        //$this->email = $email;
        //$this->username = $username;
        //$this->password = $password;
        //$this->TDG = new UserTDG;
    }
   
    //getters
    public function get_id(){
        return $this->id;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }


    //setters
    public function set_email($email){
        $this->email = $email;
    }

    public function set_username($username){
        $this->username = $username;
    }

    public function set_password($password){
        $this->password = $password;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }


    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function load_user($email){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->get_by_email($email);

        if(!$res)
        {
            $TDG = null;
            return false;
        }

        $this->id = $res['usagerID'];
        $this->email = $res['email'];
        $this->username = $res['username'];
        $this->password = $res['password'];

        $TDG = null;
        return true;
    }
    public function load_user_by_name($username){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->get_by_username($username);

        if(!$res)
        {
            $TDG = null;
            return false;
        }
       
        $this->id = $res["usagerID"];
        $this->email = $res["email"];
        $this->username = $res["username"];
        $this->password = $res["password"];

        $TDG = null;
        return true;
    }
    public function load_user_by_ID($id){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->get_by_id($id);

        if(!$res)
        {
            $TDG = null;
            return false;
        }
       
        $this->id = $res["usagerID"];
        $this->email = $res["email"];
        $this->username = $res["username"];

        $TDG = null;
        return true;
    }


    //Login Validation
    public function Login($email, $pw){

        // Regarde si l'utilisateur existes deja
        if(!$this->load_user($email))
        {
            return false;
        }

        // Regarde si le password est verifiable
        if(!password_verify($pw, $this->password))
        {
            return false;
        }

        return true;
    }

    //Register Validation
    public function validate_email_not_exists($email){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->get_by_email($email);
        $TDG = null;
        if($res)
        {
            return false;
        }

        return true;
    }

    public function register($email, $username, $pw, $vpw, $path){

        //check is both password are equals
        if(!($pw === $vpw) || empty($pw) || empty($vpw))
        {
            return false;
        }

        //check if email is used
        if(!$this->validate_email_not_exists($email))
        {
            return false;
        }

        //add user to DB
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->add_user($email, $username, password_hash($pw, PASSWORD_DEFAULT), $path);
        $TDG = null;
        return true;
    }

    public function update_user_info($email, $newmail, $newname){

        //load user infos
        if(!$this->load_user($email))
        {
          return false;
        }

        if(empty($this->id) || empty($newmail) || empty($newname)){
          return false;
        }

        //check if email is already used
        if(!$this->validate_email_not_exists($newmail) && $email != $newmail)
        {
            return false;
        }

        $this->email = $newmail;
        $this->username = $newname;

        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->update_info($this->email, $this->username, $this->id);

        if($res){
          $_SESSION["userName"] = $this->username;
          $_SESSION["userEmail"] = $this->email;
        }

        $TDG = null;
        return $res;
    }

    /*
      @var: current $email, oldpw, new pw, newpw validation
    */
    public function update_user_pw($email, $oldpw, $pw, $pwv){

        //load user infos
        if(!$this->load_user($email))
        {
          return false;
        }

        //check if passed param are valids
        if(empty($pw) || $pw != $pwv){
          return false;
        }

        //verify password
        if(!password_verify($oldpw, $this->password))
        {
            return false;
        }

        //create TDG and update to new hash
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $NHP = password_hash($pw, PASSWORD_DEFAULT);
        $res = $TDG->update_password($NHP, $this->id);
        $this->password = $NHP;
        $TDG = null;
        //only return true if update_user_pw returned true
        return $res;
    }

    public static function get_username_by_ID($id){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->get_by_id($id);
        $TDG = null;
        return $res["username"];
    }

    public function get_url_by_id($id){
        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->url_by_id($id);
        $TDG = null;
        $this->imgUrl = $res["imageProfil"];
        return $res["imageProfil"];
    }

    public function update_user_photo($url,$id){        
        $this->imgUrl = $url;

        $TDG = UserTDG::get_instance();//$TDG = new UserTDG();
        $res = $TDG->update_photo($this->imgUrl, $id);       
        
        $TDG = null;
        return $res;
    }

    public static function get_All_Users(){
        $TDG = UserTDG::get_instance();//$TDG = new userTDG();
        $users = $TDG->get_all_users();
        return $users;
    }

    public static function search_user_like($userName){
        $TDG = UserTDG::get_instance();
        $res = $TDG->search_user_name_like($userName);
        $user_list = array();

        foreach($res as $r){
            $user = new User();
            $user->set_username($r["username"]);
            $user->set_id($r["usagerID"]);
            array_push($user_list, $user);
        }
        
        return $user_list;
    }
}
