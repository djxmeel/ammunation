<?php
    require_once("../modules/sql.php");

    session_start();

    $username = trim($_POST["user"]);  //removing spaces from input
    $password = trim($_POST["pass"]);

    if(empty($username) || empty($password)){
        if(empty($username)) $_SESSION["emptyuser"] = true;  // if 1 or both empty, return to login page
        if(empty($password)) $_SESSION["emptypass"] = true;  // with suitable message

        header("Location: ../login/login.php");

        exit();
    }


    $stmt= $con->prepare("SELECT usuario, pass, isadmin FROM empleados WHERE usuario=? AND pass=?"); //prepare statement

    $stmt->bind_param("ss", $username, $password); // bind parameters (string, string)
    $stmt->execute();                               // execute the query
    $stmt->bind_result($username, $password, $isAdmin);
    $stmt->store_result();
    
    if($stmt->num_rows() === 1){

        while($stmt->fetch()){
            if($isAdmin) $_SESSION["loggedAs"] = "Admin";
            else $_SESSION["loggedAs"] = "Employee";
        }
            $_SESSION["username"] = $username;
            
            header("Location: ../index/index.php");
            exit();
    }

    $_SESSION["nocredentials"] = true;
    header("Location: ../login/login.php");

?>