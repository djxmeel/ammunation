<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>WELCOME TO AMMUNATION</title>
</head>
<?php require_once("../modules/header.php") ?>
    <main class="home_content">
        <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-cross'></i></h1>
    </main>
    <form action="" method="POST" style="float: right;">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>