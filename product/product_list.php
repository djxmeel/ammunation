<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Products</title>
<main class="home_content">
    <h1>Products <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>Name</th>
                <th class="product-image">image</th>
                <th>Cost</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php

                if(isset($_GET["deleteid"])){
                    $stmt= $con->prepare("DELETE FROM productos WHERE id=?");
                    $stmt->bind_param("s", $_GET["deleteid"]); // bind parameters (string)
                    $stmt->execute();
                    
                    unset($_GET["deleteid"]);
                }


                $query = "SELECT id,nombre,img,precio FROM productos";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>". $row["nombre"] ."</td>
                            <td class ='product-image'><img class='product-image' src='../img/guns/".$row["img"]."'/></td>
                            <td class ='category-options'>". $row["precio"] ."$</td>
                            <td><a class='category-options details' href='product_detail.php?id=".$row["id"]."'><i class='bx bx-info-circle' ></i></a></td>
                            <td><a class='category-options edit' href='product_list_update.php?id=".$row["id"]."'><i class='bx bx-edit-alt' ></i></a></td>
                            <td><a class='category-options delete' href='product_list.php?deleteid=".$row["id"]."'><i class='bx bx-x' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access in">
            <a class="links" href="product_list_update.php"><input type="button" value="Add product"></a> 
    </section>
</main>
</body>
</html>