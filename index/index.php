<?php require_once("../modules/header.php") ?>
<title>WELCOME TO AMMUNATION</title>
    <main class="home_content">
        <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-cross'></i></h1>
    </main>
    <form action="" method="POST" style="float: right;">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>