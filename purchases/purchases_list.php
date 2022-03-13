<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<title>AMMUNATION: Customers</title>
<main class="home_content">
    <h1>Selling history <i class="bx bxs-star"></i></h1>
    <section class="category-list">
        <table>
            <tr>
                <th>Date</th>
                <th class="break-none">Customer</th>
                <th>Importe</th>
                <th>State</th>
                <th>Details</th>
            </tr>
            <?php
                $query = "SELECT id, id_empleado, dni_cliente, fecha, importe, estado FROM compras";

                $result = $con->query($query);

                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td class='category-options'>".$row["fecha"]."</td>
                            <td class ='category-options break-none'>". $row["dni_cliente"]."</td>
                            <td class='category-options'>".$row["importe"]."</td>
                            <td class='category-options'>"; if($row["estado"]) echo "<i class='bx bxs-check-square'></i>"; else echo "<i class='bx bxs-x-square' ></i>";
                    echo   "<td><a class='category-options details' href='purchases_detail.php?id=".$row["id"]."'><i class='bx bx-info-circle' ></i></a></td>
                        <tr>";
                } 
            ?>
        </table>
    </section>
</main>
</body>
</html>