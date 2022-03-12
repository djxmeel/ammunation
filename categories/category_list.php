<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Categories</title>
<main class="home_content">
    <h1>Categories <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>Name</th>
                <th class="category-icon">Icon</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                if(isset($_GET["deleteid"])){
                    $stmt= $con->prepare("DELETE FROM categorias WHERE id=?");
                    $stmt->bind_param("s", $_GET["deleteid"]); // bind parameters (string)
                    $stmt->execute();
                    
                    unset($_GET["deleteid"]);
                }

                $query = "SELECT id,nombre,img FROM categorias";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td>". $row["nombre"] ."</td>
                            <td class ='category-icon'><img class='category-icon' src='../img/icons/".$row["img"]."'/></td>
                            <td><a class='category-options details' href='category_detail.php?id=".$row["id"]."'><i class='bx bx-info-circle' ></i></a></td>
                            <td><a class='category-options edit' href='category_list_update.php?id=".$row["id"]."'><i class='bx bx-edit-alt' ></i></a></td>
                            <td><a class='category-options delete' href='category_list.php?deleteid=".$row["id"]."'><i class='bx bx-x' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access">
            <a class="links" href="category_list_update.php"><input type="button" value="Add category"></a> 
    </section>
</main>
</body>
</html>