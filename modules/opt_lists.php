<?php
    $query2 = "SELECT DISTINCT nombre FROM productos WHERE id_categoria=9";

    $query3 = "SELECT * FROM categorias";

    function ammoSelect($query, $con) {
        $result = $con->query($query);
        $sentence = "";

        while($row = $result->fetch_assoc()){
                $sentence = $sentence . "<option value='".$row["nombre"]."'>".$row["nombre"]."</option>";
        }

        return $sentence;
    }

    function categorySelect($query, $con) {
        $result = $con->query($query);
        $sentence = "";

        while($row = $result->fetch_assoc()){
            $sentence = $sentence . "<option value='".$row["id"]."'>".$row["nombre"]."</option>";
        }

        return $sentence;
    }
?>