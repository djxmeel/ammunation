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
<script>
        const data = {
            labels: [
                'ARs',
                'SMGs',
                'Shotguns',
                'LMGs',
                'Snipers',
                'Handguns'
            ],
            datasets: [{
                label: 'Categories',
                data: [<?php echo $stats ?>],
                backgroundColor: [
                '#4b4453',
                '#ff0000',
                '#845ec2',
                '#4ffbdf',
                '#ff8066',
                '#4e8397'
                ],
                hoverOffset: 4
            }]
        };
        
        const config = {
            type: 'doughnut',
            data: data,
            };
        
        const myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
    </script>