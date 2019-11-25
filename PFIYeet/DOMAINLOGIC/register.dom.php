<?php
    include "../CLASSES/USER/user.php";
    include "../UTILS/formvalidator.php";
    include __DIR__ . "/../UTILS/sessionhandler.php";

    session_start();

    if(validate_session()){
        header("Location: ../error.php?ErrorMSG=Already%20logged!");
        die();
    }

    //prendre les variables du Post
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pw = $_POST["pw"];
    $pwv = $_POST["pwValidation"];
    $url = $_FILES;
    
    if(!is_null($picture)
    {
       $img_extensions_arr = array("jpg","jpeg","png","gif");
       if(!in_array($media_file_type, $img_extensions_arr))
       {
            header("Location: ../error.php?ErrorMSG=TYPE DE PHOTO INVALIDE");
            die();
        }

        $media_file_type = pathinfo($_FILES['Media']['name'] ,PATHINFO_EXTENSION); 
        $path = tempnam("../PHOTO/profil", '');
        unlink($path);
        $file_name = basename($path, ".tmp");
        $url = $target_dir . $file_name . "." . $media_file_type;
        move_uploaded_file($_FILES['Media']['tmp_name'], "../" . $url);
    }
    else{
        $url = "./PHOTO/AvatarParDefaut.png";
    }
    
    //Validation Posts
    if(!Validator::validate_email($email) || !Validator::validate_password($pw))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email or password");
        die();
    }

    $aUser = new User();

    //validateLogin
    if(!$aUser->register($email, $username, $pw, $pwv, $picture))
    {
        http_response_code(400);
        header("Location: ../error.php?ErrorMSG=invalid email or password");
        die();
    }

    header("Location: ../login.php");
    die();
?>
