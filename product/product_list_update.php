
<title>AMMUNATION: Product details</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Edit product data<i class="bx bxs-star"></i></h1>
    <section class="product-details">
        <form method="POST" enctype="multipart/form-data" action="product_detail.php?id=<?php echo $_GET["id"] ?>">
            <table>
            <?php
                    $_GET["id"] = $con->real_escape_string($_GET["id"]);
    
                    $query = "SELECT * FROM productos WHERE id=". $_GET["id"];

                    $query2 = "SELECT DISTINCT nombre FROM productos WHERE id_categoria=9";

                    function ammoSelect($query, $con) {
                        $result = $con->query($query);
                        $sentence = "";

                        while($row = $result->fetch_assoc()){
                            $sentence = $sentence . "<option value='".$row["nombre"]."'>".$row["nombre"]."</option>";
                        }

                        return $sentence;
                    }
    
                    $result = $con->query($query);
    
                    while($row = $result->fetch_assoc()){
                        echo 
                            "<tr>
                                <td colspan='2'><img class='product-image-big' src='../img/guns/".$row["img"]."'/><td>
                            <tr>
                            <tr>
                                <td><h2>File: </h2></td>
                                <td><input type='file' name='p_image'/></td>
                            </tr>
                            <tr>
                                <th><h2>Name: </h2></th>
                                <td><input name='p_name' type='text' value='".$row["nombre"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Description: </h2></td>
                                <td><input name='p_desc' type='textarea' value='".$row["descripcion"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Stock : </h2></td>
                                <td><input name='p_stock' type='text' value='".$row["stock"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Ammo: </h2></td>
                                <td>
                                    <select name='p_ammoList'>
                                        <option value=''>No AMMO</option>
                                        ".ammoSelect($query2, $con)."
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><h2>Price: </h2></td>
                                <td><input name='p_cost' type='text' value='".$row["precio"]."'/></td>
                            </tr>
                            <tr>
                                <td colspan='2'><input name='confirm_p_edit' class='links' type='submit' value='Confirm'></td>
                            </tr>";
                    } 
                ?>
            </table>
        </form>
    </section>
</main>
</body>
</html>