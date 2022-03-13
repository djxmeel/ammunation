
<title>AMMUNATION: Product details</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Edit product data <i class="bx bxs-star"></i></h1>
    <section class="product-details">
            <?php
                if(isset($_GET["id"])){

                    $_GET["id"] = $con->real_escape_string($_GET["id"]);
                    
                    echo "<form method='POST' enctype='multipart/form-data' action='category_edit_process.php?id=".$_GET['id']."'>
                            <table>";
                    
                    if(isset($_SESSION["notUploaded"])){
                        echo "<tr><td colspan=2>File is not an image!</td></tr>";
                        unset($_SESSION["notUploaded"]);
                    }

                    $query = "SELECT * FROM categorias WHERE id=". $_GET["id"];
    
                    $result = $con->query($query);
    
                    while($row = $result->fetch_assoc()){
                        echo 
                            "<tr>
                                <td colspan='2'><img class='product-image-big' src='../img/icons/".$row["img"]."'/><td>
                            <tr>
                            <tr>
                                <td><h2>Image: </h2></td>
                                <td><input type='file' name='c_image'/></td>
                            </tr>
                            <tr>
                                <th><h2>Name: </h2></th>
                                <td><input name='c_name' type='text' value='".$row["nombre"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Description: </h2></td>
                                <td><input name='c_desc' type='textarea' value='".$row["descripcion"]."'/></td>
                            </tr>
                            <tr>
                                <td><a href='category_list.php'><input class='links' type='button' value='<< Back'></a></td>
                                <td><input name='confirm_c_edit' class='links' type='submit' value='Confirm'></td>
                            </tr>
                        </table>
                    </form>";
                    } 
                } else {
            ?>
            <form method='POST' enctype='multipart/form-data' action='category_edit_process.php'>
                <table>
                    <?php 
                        if(isset($_SESSION["notUploaded"])){
                            echo "<tr><td colspan=2>File is not an image!</td></tr>";
                            unset($_SESSION["notUploaded"]);
                        }
                    ?>
                    <tr>
                        <td><h2>Image: </h2></td>
                        <td><input type='file' name='c_image'/></td>
                    </tr>
                    <tr>
                        <th><h2>Name: </h2></th>
                        <td><input name='c_name' type='text' value=''/></td>
                    </tr>
                    <tr>
                        <td><h2>Description: </h2></td>
                        <td><input name='c_desc' type='textarea' value=''/></td>
                    </tr>
                    <tr>
                    <td><a href='category_list.php'><input class='links' type='button' value='<< Back'></a></td>
                        <td><input name='confirm_c_add' class='links' type='submit' value='Confirm'></td>
                    </tr>
                </table>
            </form>
            <?php }?>
    </section>
</main>
</body>
</html>