
<title>WELCOME TO AMMUNATION</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Product Details <i class="bx bxs-star"></i></h1>
    <section class="product-details">
        <table>
        <?php
                $_GET["id"] = $con->real_escape_string($_GET["id"]);

                $query = "SELECT * FROM productos WHERE id=". $_GET["id"];

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo 
                        "<tr>
                            <th colspan='2'><h1>".$row["nombre"]."</h1></th>
                        </tr>
                        <tr>
                            <td colspan='2'><img class='product-image-big' src='../img/guns/".$row["img"]."'/><td>
                        <tr>
                        <tr>
                            <th colspan='2'><h1>Details</h1></th>
                        </tr>
                        <tr>
                            <td><h2>Description : </h2></td>
                            <td>".$row["descripcion"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Stock : </h2></td>
                            <td>".$row["stock"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Ammo : </h2></td>
                            <td>".$row["ammo"]."</td>
                        </tr>
                        <tr>
                            <td><h1>Price : </h1></td>
                            <td><h1>".$row["precio"]."$</h1></td>
                        </tr>
                        <tr>
                            <td colspan='2'><a class='links' href='product_list_update.php?id=".$row["id"]."'><input type='button' value='Edit'></a></td>
                        </tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access">
    </section>
</main>
</body>
</html>