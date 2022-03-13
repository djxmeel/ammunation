
<title>WELCOME TO AMMUNATION</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Purchase details <i class="bx bxs-star"></i></h1>
    <section class="product-details left-align">
        <table>
            <?php
                    $_GET["id"] = $con->real_escape_string($_GET["id"]);

                    $query = "SELECT * FROM compras WHERE id=". $_GET["id"];

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo 
                            "<tr>
                                <th colspan=2><h1>Invoice ID: ".$row["id"]."</h1></th>
                                <th colspan=3>"; if($row["estado"]) echo "<i class='bx bxs-check-square'></i>"; else echo "<i class='bx bxs-x-square' ></i></th>";
                        echo"</tr>
                            <tr>
                                <td colspan=2><h1>Day:</h1></td>
                                <td colspan=3>".$row["fecha"]."</td>
                            </tr>
                            <tr>
                                <td colspan=2><h1>Customer's DNI:</h1></td>
                                <td colspan=3><a href='../customer/customer_detail.php?dni=".$row["dni_cliente"]."'>".$row["dni_cliente"]." >></a></td>
                            </tr>
                            <tr>
                                <td colspan=2><h1>Total:</h1></td>
                                <td colspan=3>".$row["importe"]."</td>
                            </tr>
                            <tr>
                                <td><a class='links' href='purchases_list.php'><input type='button' value='<< Back'></a></td>
                            </tr>";
                    }
                ?>
                <tr>
                    <th>Name</th>
                    <th class='product-image'>image</th>
                    <th>Cost per unit</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                    $query = "SELECT *, dc.precio_venta*dc.cantidad AS subtotal from detalles_compra as dc INNER JOIN productos AS p ON dc.id_producto=p.id WHERE dc.id_compra=".$_GET["id"];

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>". $row["nombre"] ."</td>
                                <td class ='product-image'><img class='product-image' src='../img/guns/".$row["img"]."'/></td>
                                <td class ='category-options'>". $row["precio_venta"] ."$</td>
                                <td class ='category-options'>". $row["cantidad"] ."</td>
                                <td class ='category-options'>". $row["subtotal"] ."$</td>
                            <tr>";
                    } 
                ?>
        </table>
    </section>
</main>
</body>
</html>