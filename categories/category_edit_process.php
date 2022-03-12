<?php
    session_start();
    require_once("../modules/sql.php");

    define("ROUTE", "../img/icons/");

    if(isset($_POST["confirm_c_edit"])){

        if(isset($_FILES["c_image"]) && !empty($_FILES["c_image"]["name"])) {
            
            $target_file = ROUTE . $_FILES["c_image"]["name"];

            $isImage = getimagesize($_FILES["c_image"]["tmp_name"]);
            
            $isUploaded = false;

            if($isImage !== false){
                if(in_array($isImage[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
                    if(file_exists($target_file) !== true){
                        if(move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file)){
                            $isUploaded = true;
                        }
                    }
                }
            }

            if($isUploaded === false){
                header("Location: category_list_update.php?id=". $_GET["id"]);
                $_SESSION["notUploaded"] = true;
                exit();
            }

            $stmt = $con->prepare("UPDATE categorias SET img=? WHERE id=" . $_GET["id"]);
            $stmt->bind_param("s", $_FILES["c_image"]["name"]);
            $stmt->execute();

        }

        $stmt= $con->prepare("UPDATE categorias SET nombre=?, descripcion=? WHERE id=".$_GET["id"]); //prepare statement

        $stmt->bind_param("ss", $_POST["c_name"], $_POST["c_desc"]); // bind parameters (string, string)
        $stmt->execute();
        
        // TODO file upload

        unset($_POST["confirm_c_edit"] ,$_POST["c_name"], $_POST["c_desc"], 
        $_FILES["c_image"], $_POST["c_image"]);
        
        header("Location: category_detail.php?id=".$_GET["id"]);
    }

    if(isset($_POST["confirm_c_add"])){

        if(isset($_FILES["c_image"]) && !empty($_FILES["c_image"]["name"])) {
            
            $target_file = ROUTE . $_FILES["c_image"]["name"];

            $isImage = getimagesize($_FILES["c_image"]["tmp_name"]);
            
            $isUploaded = false;

            if($isImage !== false){
                if(in_array($isImage[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
                    if(file_exists($target_file) !== true){
                        if(move_uploaded_file($_FILES["c_image"]["tmp_name"], $target_file)){
                            $isUploaded = true;
                        }
                    }
                }
            }

            if(!$isUploaded){
                header("Location: category_list_update.php");
                $_SESSION["notUploaded"] = true;
                exit();
            }

        }

        $stmt= $con->prepare("INSERT INTO categorias(nombre, descripcion, img) VALUES (?,?,?)"); //prepare statement

        $stmt->bind_param("sss", $_POST["c_name"], $_POST["c_desc"], $_FILES["c_image"]["name"]); // bind parameters (string, string)
        $stmt->execute();
        
        unset($_POST["confirm_c_add"] ,$_POST["c_name"], $_POST["c_desc"], 
        $_FILES["c_image"], $_POST["c_image"]); 
        
        header("Location: category_list.php");
        
    }
?>