<?php
    require_once("sql.php");

    $query = "SELECT COUNT(id_categoria) AS count FROM productos GROUP BY id_categoria ORDER BY id_categoria";

    $result = $con->query($query);

    $stats = ",";

    while($row = $result->fetch_assoc()){
        $stats = $stats.",".$row["count"];
    }

    $stats = trim($stats, ",");
?>
