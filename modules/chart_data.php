<?php
    require_once("sql.php");

    $query = "SELECT COUNT(id_categoria) AS count FROM productos GROUP BY id_categoria ORDER BY id_categoria "
?>