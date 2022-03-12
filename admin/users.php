<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Customers</title>
<main class="home_content">
    <h1>Users <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                if(isset($_GET["deleteid"])){
                    $stmt= $con->prepare("DELETE FROM empleados WHERE id=?");
                    $stmt->bind_param("s", $_GET["deleteid"]); // bind parameters (string)
                    $stmt->execute();
                    
                    unset($_GET["deleteid"]);
                }

                $query = "SELECT id,usuario, isadmin FROM empleados";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td class='category-options'>".$row["id"]."</td>
                            <td class='category-options'>". $row["usuario"] ."</td>
                            <td class='category-options'>";if($row["isadmin"]) echo "yes"; else echo "no";
                    echo    "</td>
                            <td><a class='category-options edit' href='users_update.php?id=".$row["id"]."'><i class='bx bx-edit-alt' ></i></a></td>
                            <td><a class='category-options delete' onClick=\"return confirm('Are you sure?')\" href='users.php?deleteid=".$row["id"]."'><i class='bx bx-x' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
    <section class="quick-access in">
            <a class="links" href="users_update.php"><input type="button" value="Register user"></a> 
    </section>
</main>
</body>
</html>