
<title>WELCOME TO AMMUNATION</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Category details <i class="bx bxs-star"></i></h1>
    <section class="product-details">
        <table>
            <?php
                    $_GET["id"] = $con->real_escape_string($_GET["id"]);

                    $query = "SELECT * FROM categorias WHERE id=". $_GET["id"];

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo 
                            "<tr>
                                <th colspan=6><h1>".$row["nombre"]."s</h1></th>
                            </tr>
                            <tr>
                                <td colspan=6><img class='category-image-big' src='../img/icons/".$row["img"]."'/><td>
                            <tr>
                            <tr>
                                <th colspan=6><h1>Description</h1></th>
                            </tr>
                            <tr>
                                <td colspan=6>".$row["descripcion"]."</td>
                            </tr>
                            </tr>
                            <tr>
                                <td colspan=2><a class='links' href='category_list.php'><input type='button' value='<< Back'></a></td>    
                                <td colspan=4><a class='links' href='category_list_update.php?id=".$row["id"]."'><input type='button' value='Edit'></a></td>
                            </tr>";
                    }
                ?>
                <tr>
                    <th>Name</th>
                    <th class='product-image'>image</th>
                    <th>Cost</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $query = "SELECT id,nombre,img,precio FROM productos WHERE id_categoria=". $_GET["id"];

                    $result = $con->query($query);

                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>". $row["nombre"] ."</td>
                                <td class ='product-image'><img class='product-image' src='../img/guns/".$row["img"]."'/></td>
                                <td class ='category-options'>". $row["precio"] ."$</td>
                                <td><a class='category-options details' href='../product/product_detail.php?id=".$row["id"]."'><i class='bx bx-info-circle' ></i></a></td>
                                <td><a class='category-options edit' href='../product/product_list_update.php?id=".$row["id"]."'><i class='bx bx-edit-alt' ></i></a></td>
                                <td><a class='category-options delete' href='../product/product_list_update.php?deleteid=".$row["id"]."'><i class='bx bx-x' ></i></a></td>
                            <tr>";
                    } 
                ?>
        </table>
    </section>
</main>
</body>
</html>