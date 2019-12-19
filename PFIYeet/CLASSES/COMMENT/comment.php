<?php
    include "commentTDG.php";
    include_once __DIR__ . "/../USER/User.php";

    class comment{

        private $id;
        private $typeObjet;
        private $tempsCreation;
        private $auteurID;
        private $content;
        private $targetID;

        /*
        public function __construct($id, $authorID, $threadID, $content){
            $this->id = $id;
            $this->authorID = $authorID;
            $this->threadID = $threadID;
            $this->content = $content;
        }
        */

        //getters
        public function get_id(){
            return $this->id;
        }
        public function get_auteurID(){
            return $this->auteurID;
        }

        public function get_typeObjet(){
            return $this->typeObjet;
        }
        public function get_tempsCreation(){
            return $this->tempsCreation;
        }

        public function get_content(){
            return $this->content;
        }
        public function get_targetID(){
            return $this->targetID;
        }

        //setters
        public function set_id($id){
            $this->id = $id;
        }
        public function set_typeObjet($typeObjet){
            $this->typeObjet = $typeObjet;
        }
        public function set_tempsCreation($tempsCreation){
            $this->tempsCreation = $tempsCreation;
        }
        public function set_auteurID($auteurID){
            $this->auteurID = $auteurID;
        }
        public function set_content($content){
            $this->content = $content;
        }
        public function set_targetID($targetID){
            $this->targetID = $targetID;
        }

        //QOL
        public function add_comment($typeObjet, $auteurID, $content, $targetID){
            $TDG = commentTDG::getInstance();//$TDG = new commentTDG();
           
            $res = $TDG->add_comment($typeObjet, $auteurID, $content, $targetID);
            $TDG = null;
            return $res;
        }

        public function update(){
            $TDG = commentTDG::getInstance();//$TDG = new commentTDG();
            $res = $TDG->edit_comment($this->content, $this->id);
            $TDG = null;
            return $res;

        }

        static  public function delete_by_id($id){
            $TDG = commentTDG::getInstance();//$TDG = new commentTDG();
            $res = $TDG->delete_comment_by_id($id);
            $TDG = null;
            return $res;
        }
        static public function delete_by_target_id($targetId){
            $TDG = commentTDG::getInstance();
            $res = $TDG->delete_comment_by_targetID($targetId);
            $TDG = null;
            return $res;
        }
        

        public function display(){
            $id = $this->id;
            $tempsCreation = $this->tempsCreation;
            $typeObjet = $this->typeObjet;
            $auteurID = $this->auteurID;
            $content = $this->content;
            $targetID = $this->targetID;
            $user = new User();
            $user->load_user_by_ID($auteurID);
            include "HTML/commenttemplate.php";
        }

        public function load_comment($id){
            $TDG = commentTDG::getInstance();//$TDG = new commentTDG();
            $res = $TDG->get_by_ID($id);

            //$res2 = User::get_username_by_ID($res["authorID"]);

            $TDG = null;
            $this->set_id($res["commentaireID"]);
            $this->set_auteurID($res["auteurID"]);
            $this->set_tempsCreation($res['tempsCreation']);
            $this->set_typeObjet($res['typeObjet']);
            $this->set_content($res["contenu"]);
            $this->set_targetID($res["targetID"]);

            return $res;
        }

        public function get_list_comment_by_idTarget_type($idTarget, $typeObjet){
            $TDG = commentTDG::getInstance();// new commentTDG();
            $res = $TDG->get_all_comment_by_targetID_type($idTarget, $typeObjet);

            $commentList = array();

            foreach($res as $c){
                $comment = new comment();
                $comment->set_id($c["commentaireID"]);
                $comment->set_typeObjet($c["typeObjet"]);
                $comment->set_auteurID($c["auteurID"]);
                $comment->set_tempsCreation($c["tempsCreation"]);
                $comment->set_content($c["contenu"]);
                $comment->set_targetID($c["targetID"]);
                array_push($commentList, $comment);
            }

            return $commentList;
        }

    }

?>
