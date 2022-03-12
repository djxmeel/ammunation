<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Customers</title>
<main class="home_content">
    <h1>Customers <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th class="break-none">DNI</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Details</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                if(isset($_GET["deleteid"])){
                    $stmt= $con->prepare("DELETE FROM clientes WHERE dni=?");
                    $stmt->bind_param("s", $_GET["deleteid"]); // bind parameters (string)
                    $stmt->execute();
                    
                    unset($_GET["deleteid"]);
                }

                $query = "SELECT dni,nombre,apellido1,apellido2 FROM clientes";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td class='break-none'>". $row["dni"] ."</td>
                            <td class='category-options'>".$row["nombre"]."</td>
                            <td class ='category-options'>". $row["apellido1"]." ". $row["apellido2"] ."</td>
                            <td><a class='category-options details' href='customer_detail.php?dni=".$row["dni"]."'><i class='bx bx-info-circle' ></i></a></td>
                            <td><a class='category-options edit' href='customer_list_update.php?dni=".$row["dni"]."'><i class='bx bx-edit-alt' ></i></a></td>
                            <td><a class='category-options delete' onClick=\"return confirm('Are you sure?')\" href='customer_list.php?deleteid=".$row["dni"]."'><i class='bx bx-x' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access in">
            <a class="links" href="customer_list_update.php"><input type="button" value="Add customer"></a> 
    </section>
</main>
</body>
</html>