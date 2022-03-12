<?php
    session_start();
    require_once("../modules/sql.php");

    if(isset($_POST["confirm_c_edit"])){

        $stmt= $con->prepare("UPDATE empleados SET usuario=?, pass=?, isadmin=? WHERE id='".$_GET["id"] . "'"); //prepare statement

        $stmt->bind_param("ssi", $_POST["username"], $_POST["password"], $_POST["admin"]);       
        $stmt->execute();
        
        unset($_POST["username"], $_POST["password"], $_POST["admin"]);
    }

    if(isset($_POST["confirm_c_add"])){

        $stmt= $con->prepare("INSERT INTO empleados(usuario, pass, isadmin) VALUES (?,?,?)"); //prepare statement

        $stmt->bind_param("ssi", $_POST["username"], $_POST["password"], $_POST["admin"]);  
        $stmt->execute();
        
        unset($_POST["username"], $_POST["password"], $_POST["admin"]); 
    }

        header("Location: users.php");
?>