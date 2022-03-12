
<title>AMMUNATION: Product details</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");
        require_once("../modules/opt_lists.php");?>
<main class="home_content flex-column-center">
    <h1>Edit product data <i class="bx bxs-star"></i></h1>
    <section class="product-details">
            <?php
                if(isset($_GET["id"])){

                    $_GET["id"] = $con->real_escape_string($_GET["id"]);
                    
                    echo "<form method='POST' enctype='multipart/form-data' action='product_edit_process.php?id=".$_GET['id']."'>
                            <table>";
                    
                    if(isset($_SESSION["notUploaded"])){
                        echo "<tr><td colspan=2>File is not an image!</td></tr>";
                        unset($_SESSION["notUploaded"]);
                    }

                    $query = "SELECT * FROM productos WHERE id=". $_GET["id"];
    
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
                                <td><h2>Category: </h2></td>
                                <td>
                                    <select name='p_categoryList'>
                                        ".categorySelect($query3, $con)."
                                    </select>
                                </td>
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
                            </tr>
                        </table>
                    </form>";
                    } 
                } else {
            ?>
            <form method='POST' enctype='multipart/form-data' action='product_edit_process.php'>
                <table>
                    <?php 
                        if(isset($_SESSION["notUploaded"])){
                            echo "<tr><td colspan=2>File is not an image!</td></tr>";
                            unset($_SESSION["notUploaded"]);
                        }
                    ?>
                    <tr>
                        <td><h2>File: </h2></td>
                        <td><input type='file' name='p_image'/></td>
                    </tr>
                    <tr>
                        <th><h2>Name: </h2></th>
                        <td><input name='p_name' type='text' value=''/></td>
                    </tr>
                    <tr>
                        <td><h2>Category: </h2></td>
                        <td>
                            <select name='p_categoryList'>
                                <?php echo categorySelect($query3, $con) ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><h2>Description: </h2></td>
                        <td><input name='p_desc' type='textarea' value=''/></td>
                    </tr>
                    <tr>
                        <td><h2>Stock : </h2></td>
                        <td><input name='p_stock' type='text' value=''/></td>
                    </tr>
                    <tr>
                        <td><h2>Ammo: </h2></td>
                        <td>
                            <select name='p_ammoList'>
                                <option value=''>No AMMO</option>
                                <?php echo ammoSelect($query2, $con) ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><h2>Price: </h2></td>
                        <td><input name='p_cost' type='text' value=''/></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input name='confirm_p_add' class='links' type='submit' value='Confirm'></td>
                    </tr>
                </table>
            </form>
            <?php }?>
    </section>
</main>
</body>
</html>