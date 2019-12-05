<?php

include_once __DIR__ . "/albumTDG.php";
//include_once __DIR__ . "/../IMAGE/image.php";

class Album{

    private $id;
    private $title;
    private $proprietaire;
    private $description;
    private $tempsCreation;

    public function __construct(){
    }

    //getters
    public function get_id(){
        return $this->id;
    }

    public function get_title(){
        return $this->title;
    }

    //setters
    public function set_id($id){
        $this->id = $id;
    }

    public function set_title($title){
        $this->title = $title;
    }
    public function set_proprietaire($proprietaire){
        $this->proprietaire = $proprietaire;
    }

    public function set_description($description){
        $this->description = $description;
    }
    public function set_time($temps){
        $this->tempsCreation = $temps;
    }

    /*
        Quality of Life methods (Dans la langue de shakespear (ou QOLM pour les intimes))
    */
    public function load_album_by_id($id){
        $TDG = new AlbumTDG();
        $res = $TDG->get_by_ID($id);

        if(!$res){
            return false;
        }

        $this->id = $res["id"];
        $this->title = $res["title"];

        return true;
    }

    public function load_album_by_title($title){
        $TDG = new AlbumTDG();
        $res = $TDG->get_by_title($title);

        if(!$res){
            return false;
        }

        $this->id = $res["id"];
        $this->title = $res["title"];

        return true;
    }


    public function add_album($title){
        $TDG = new AlbumTDG();
        $res = $TDG->add_album($title);
        $TDG = null;
        if(!$res)
        {
            return $res;
        }
        return $res;
    }

    public function display_album(){
        $title = $this->title;
        $id = $this->id;
        echo "<div class='card bg-dark mb-4'>";
        echo "<div class='card-header text-left '><a href='displayalbum.php?albumID=$id&albumTitle=$title'><h5>$title</h5></a>";
        echo "</div>";
        echo "</div>";
    }

    /*
    Post related functions
    */
    public function load_image(){
        $res = Image::create_image_list($this->id);

        if(!$res)
        {
            return false;
        }
       $this->posts = $res;
   }

    /*public function display_posts(){
        if(empty($this->posts)){
            $this->load_posts();
        }

        if(empty($this->posts))
        {
            echo "<h3 class='mb-4'>No Post found in this thread</h3>";
        }
        else{

            foreach($this->posts as $posts => $post){
                $post->display();
              }
        }
    }*/

    /*
    STATIC FUNCTIONS
    */
    private static function list_all_albums_by_id($userid){
        $TDG = new AlbumTDG();
        $res = $TDG->get_all_albums_by_id($userid);
        $TDG = null;
        if(!$res)
        {
          return $res;
        }
        return $res;
    }

    public static function create_album_list($userid){
        $TDG_res = Album::list_all_albums_by_id($userid);
        $album_list = array();

        foreach($TDG_res as $r){
            $album = new Album();
            $album->set_id($r["albumID"]);
            $album->set_title($r["titre"]);
            $album->set_proprietaire($r["proprietaire"]);
            $album->set_description($r["description"]);
            $album->set_time($r["tempsCreation"]);
            array_push($album_list, $album);
        }

        return $album_list;
    }

    public static function search_album($title){
        $TDG = new AlbumTDG();
        $res = $TDG->search_album_title_like($title);
        $album_list = array();

        foreach($res as $r){
            $album = new Album();
            $album->set_id($r["id"]);
            $album->set_title($r["title"]);
            array_push($album_list, $album);
        }
        
        return $album_list;
    }

}
