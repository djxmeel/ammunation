<?php require_once("../modules/header.php");
require_once("../modules/sql.php");?>
<title>WELCOME TO AMMUNATION</title>
<main class="home_content">
    <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-cross'></i></h1>
    <section class="col-12 col-sm-6">
        <div>
            <h1>Products</h1>
            <canvas id="myChart"></canvas>
        </div>
    </section>
    <section class="col-12 col-sm-6">
        
        </section>
    </main>
    <?php require_once("../modules/chart_data.php");?>
</body>
</html>