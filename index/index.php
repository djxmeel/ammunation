<?php require_once("../modules/header.php");
require_once("../modules/sql.php");?>

<main class="home_content">
    <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bxs-star'></i></h1>
    <article class="dash-content row">
        <section class="dash-left col-12 col-md-5">
            <h1>Products</h1>
            <ul class="counter">
                <?php 
                    $query = "SELECT c.nombre ,COUNT(p.nombre) AS count FROM productos AS p INNER JOIN categorias AS c ON c.id = p.id_categoria GROUP BY id_categoria";

                    $result = $con->query($query);
                    while($row = $result->fetch_assoc()){
                        echo "<li>" . $row["nombre"] . " : " . $row["count"] . "</li>";
                    }
                ?>
            </ul>
            <h1>Users</h1>
            <ul class="counter">
                <?php 
                    $query = "SELECT COUNT(*)AS count FROM empleados GROUP BY isadmin ORDER BY isadmin DESC";

                    $result = $con->query($query);
                    $swap = true;
                    while($row = $result->fetch_assoc()){
                        if($swap) echo "<li> Admins : " . $row["count"] . "</li>";
                        else echo "<li> Empleados : " . $row["count"] . "</li>";
                        $swap = false;
                    }
                ?>
            </ul>
        </section>
        <section class="dash-right col-12 col-md-7">
            <h1>About us</h1>
            Manufacturer of weapons - and reasons to own weapons, Ammu-Nation has zealously defended arms profiteering for over 50 years. The name Ammu-Nation is a portmanteau of ammunition and nation, which implies the store is patriotic. In many Ammu-Nation stores, battle flags of the Confederate States of America can be seen on the walls. Ammu-Nation was founded in 1963. 
            <h1>Shops</h1>
            <div class="shops">
                <img src="../img/shops/ammunation1.png">
                <img src="../img/shops/ammunation2.png">
                <img src="../img/shops/ammunation3.png">
                <img src="../img/shops/ammunation4.png">
            </div>
        </section>
        <section class="quick-access col-12">
            <h1>Quick Access : </h1>
            <a class="links" href="../product/product_list_update.php"><input type="button" value="Add product"></a> 
            <a class="links" href="../categories/category_list_update.php"><input type="button" value="Add category"></a> 
            <a class="links" href="../customer/customer_list_update.php"><input type="button" value="Add Customer"></a> 
        </section>
    </article>
</main>
</body>
</html>