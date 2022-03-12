<?php
    session_start();
    require_once("../modules/sql.php");

    define("ROUTE", "../img/guns/");

    if(isset($_POST["confirm_p_edit"])){

        if(isset($_FILES["p_image"]) && !empty($_FILES["p_image"]["name"])) {
            
            $target_file = ROUTE . $_FILES["p_image"]["name"];

            $isImage = getimagesize($_FILES["p_image"]["tmp_name"]);
            
            $isUploaded = false;

            if($isImage !== false){
                if(in_array($isImage[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
                    if(file_exists($target_file) !== true){
                        if(move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)){
                            $isUploaded = true;
                        }
                    }
                }
            }

            if($isUploaded === false){
                header("Location: product_list_update.php?id=". $_GET["id"]);
                $_SESSION["notUploaded"] = true;
                exit();
            }

            $stmt = $con->prepare("UPDATE productos SET img=? WHERE id=" . $_GET["id"]);
            $stmt->bind_param("s", $_FILES["p_image"]["name"]);
            $stmt->execute();

        }

        $stmt= $con->prepare("UPDATE productos SET nombre=?, id_categoria=?, descripcion=?, stock=?, precio=?, ammo=? WHERE id=".$_GET["id"]); //prepare statement

        $stmt->bind_param("ssssss", $_POST["p_name"], $_POST["p_categoryList"], $_POST["p_desc"], $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"]); // bind parameters (string, string)
        $stmt->execute();
        
        // TODO file upload

        unset($_POST["confirm_p_edit"]);
        unset($_POST["p_name"], $_POST["p_categoryList"], $_POST["p_desc"], 
        $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"], 
        $_FILES["p_image"], $_POST["p_image"]); 
        
        header("Location: product_detail.php?id=".$_GET["id"]);
    }

    if(isset($_POST["confirm_p_add"])){

        if(isset($_FILES["p_image"]) && !empty($_FILES["p_image"]["name"])) {
            
            $target_file = ROUTE . $_FILES["p_image"]["name"];

            $isImage = getimagesize($_FILES["p_image"]["tmp_name"]);
            
            $isUploaded = false;

            if($isImage !== false){
                if(in_array($isImage[2], array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
                    if(file_exists($target_file) !== true){
                        if(move_uploaded_file($_FILES["p_image"]["tmp_name"], $target_file)){
                            $isUploaded = true;
                        }
                    }
                }
            }

            if(!$isUploaded){
                header("Location: product_list_update.php");
                $_SESSION["notUploaded"] = true;
                exit();
            }

        }

        $stmt= $con->prepare("INSERT INTO productos(nombre, id_categoria, descripcion, stock, precio, ammo, img) VALUES (?,?,?,?,?,?,?)"); //prepare statement

        $stmt->bind_param("sssssss", $_POST["p_name"], $_POST["p_categoryList"], $_POST["p_desc"], $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"], $_FILES["p_image"]["name"]); // bind parameters (string, string)
        $stmt->execute();
        
        unset($_POST["confirm_p_add"]);
        unset($_POST["p_name"], $_POST["p_categoryList"], $_POST["p_desc"], 
        $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"], 
        $_FILES["p_image"], $_POST["p_image"]); 
        
        header("Location: product_list.php");
        
    }
?>