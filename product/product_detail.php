
<title>AMMUNATION: Product details</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Product Details <i class="bx bxs-star"></i></h1>
    <section class="product-details">
        <table>
        <?php
                if(isset($_POST["confirm_p_edit"])){
                    $stmt= $con->prepare("UPDATE productos SET nombre=?, descripcion=?, stock=?, precio=?, ammo=?, img=? WHERE id=".$_GET["id"]); //prepare statement

                    $stmt->bind_param("ssssss", $_POST["p_name"], $_POST["p_desc"], $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"], $_FILES["p_image"]["name"]); // bind parameters (string, string)
                    $stmt->execute();
                    echo "<tr>
                            <td colspan=2>Product Edited!</td>
                        </tr>";

                    unset($_POST["confirm_p_edit"]);
                    unset($_POST["p_name"], $_POST["p_desc"], 
                            $_POST["p_stock"], $_POST["p_cost"], $_POST["p_ammoList"], 
                                $_FILES["p_image"], $_POST["p_image"]); 
                }

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
                            <td><h2>Description: </h2></td>
                            <td>".$row["descripcion"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Stock: </h2></td>
                            <td>".$row["stock"]."</td>
                        </tr>
                        <tr>
                            <td><h2>Ammo: </h2></td>
                            <td>".$row["ammo"]."</td>
                        </tr>
                        <tr>
                            <td><h1>Price: </h1></td>
                            <td><h1>".$row["precio"]."$</h1></td>
                        </tr>
                        <tr>
                            <td colspan='2'><a class='links' href='product_list_update.php?id=".$row["id"]."'><input type='button' value='Edit'></a></td>
                        </tr>";
                } 
            ?>
        </table>
    </section>
</main>
</body>
</html>