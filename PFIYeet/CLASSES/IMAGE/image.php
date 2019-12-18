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
     
    }

    public function addImage($url, $albumID, $description){
        $TDG = new ImageTDG();
        $res = $TDG->add_Image($url,$albumID, $description);
        $TDG = null;
        return $res;
    }
}