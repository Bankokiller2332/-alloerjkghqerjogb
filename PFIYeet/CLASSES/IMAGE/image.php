<?php

include_once __DIR__ . "/imageTDG.php";

class Image{

    private $id;
    private $albumID;
    private $URL;
    private $description;
    private $tempsCreation;

    public function set_id($id){
        $this->id = $id;
    }

    public function set_albumID($albumID){
        $this->albumID = $albumID;
    }

    public function set_URL($URL){
        $this->URL = $URL;
    }

    public function set_description($description){
        $this->description = $description;
    }

    public function set_tempsCreation($tempsCreation){
        $this->tempsCreation = $tempsCreation;
    }

    public function get_URL()
    {
        return $this->URL;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_id()
    {
        return $this->id;
    }

    //public function __construct($id, $albumID, $URL, $description, $tempsCreation){
   //     $this->id = $id;
   //     $this->type = $type;
   ///     $this->URL = $URL;
    //    $this->title = $title;
    //}

    private static function fetch_images_by_albumID($albumID){
        $TDG = new imageTDG();
        $res = $TDG->get_images_by_albumID($albumID);
        $TDG = null;
        return $res;
    }

    public function delete()
    {
        $TDG = new ImageTDG();
        $TDG->delete($this->id);
    }

    public static function delete_by_id($id)
    {
        $TDG = new ImageTDG();
        $TDG->delete($id);
    }

    public static function create_image_list($albumID){

        $info_array=Image::fetch_images_by_albumID($albumID);
        $image_list = array();

        foreach($info_array as $ia){
            $temp_image = new Image();
            $temp_image->set_id($ia["imageID"]);
            $temp_image->set_albumID($ia["albumID"]);
            $temp_image->set_URL($ia["URL"]);
            $temp_image->set_description($ia["description"]);
            $temp_image->set_tempsCreation($ia["tempsCreation"]);
            array_push($image_list, $temp_image);
        }
        return $image_list;
    }

    public function display(){
        $image = new Image();
        $image->set_id($this->id);
        $image->set_albumID($this->albumID);
        $image->set_URL($this->URL);
        $image->set_description($this->description);
        $image->set_tempsCreation($this->tempsCreation);       
        return $image;
    }

    public function addImage($url, $albumID, $description){
        $TDG = new ImageTDG();
        $res = $TDG->add_Image($url,$albumID, $description);
        $TDG = null;
        return $res;
    }

    
=======
    public static function search_image_like($description){
        $TDG = new imageTDG();
        $res = $TDG->search_image_desc_like($description);
        $image_list = array();

        foreach($res as $r){
            $image = new Image();
            $image->set_id($r["imageID"]);
            $image->set_description($r["description"]);
            $image->set_albumID($r["albumID"]);
            $image->set_URL($r["URL"]);
            array_push($image_list, $image);
        }
        
        return $image_list;
    }
}