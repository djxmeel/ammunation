<?php require_once("../modules/header.php");
require_once("../modules/sql.php");?>
<title>WELCOME TO AMMUNATION</title>
    <main class="home_content">
        <h1>WELCOME TO AMMUNATION <?php echo strtoupper($_SESSION["username"]) ?> <i class='bx bx-cross'></i></h1>
        <section class="col-12 col-sm-6">
            <div>
                <h1>Products</h1>
                <canvas id="myChart"></canvas>
            </div>
        </section>
        <section class="col-12 col-sm-6">
        
        </section>
    </main>
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
                data: [20, 20, 20, 20, 20, 20],
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

        const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config
        );
    </script>
</body>
</html>