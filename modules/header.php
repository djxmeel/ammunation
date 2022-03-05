<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="../js/chart.min.js"></script>
</head>
<body>
    <?php
        session_start();
        
        if(isset($_POST["logout"])){ // Unsets the login if logout button is submitted
            unset($_SESSION["loggedAs"]);
            unset($_POST["logout"]);
        }

        if(!isset($_SESSION["loggedAs"])){
            header("Location: ../login/login.php");
            exit(); 
        }
    ?>
    <div class="sidebar">
        <div class="logo_content">
            <img src="../img/ammunation_logo.webp" class="logo" alt="AMMUNATION">
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <i class='bx bx-search-alt' ></i>
                <form action="">
                    <input type="text" placeholder="Search..." name="search" id="">
                </form>
            </li>
            <li>
                <a href="../index/index.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="../product/product_list.php">
                    <i class='bx bx-cross'></i>
                    <span class="links_name">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="../categories/category_list.php">
                    <i class='bx bx-folder'></i>
                    <span class="links_name">Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href="../customer/customer_list.php">
                    <i class='bx bx-group' ></i>
                    <span class="links_name">Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>
            <li>
                <a href="../purchases/purchases_list.php">
                    <i class='bx bx-money-withdraw' ></i>
                    <span class="links_name">Invoices</span>
                </a>
                <span class="tooltip">Invoices</span>
            </li>
            <?php
            if($_SESSION["loggedAs"] === "Admin"){
                echo "<li>
                        <a href='../admin/users.php'>
                            <i class='bx bx-user-circle' ></i>
                            <span class='links_name'>Users</span>
                        </a>
                        <span class='tooltip'>Users</span>
                    </li>";
                }
            ?>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <i class='bx bx-user' ></i>
                    <div class="name_role">
                        <div class="name"><?php echo strtoupper($_SESSION["username"]) ?></div>
                        <div class="role"><?php echo $_SESSION["loggedAs"] ?></div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </div>
        </div>
    </div>
    <script src="../js/sidebar.js"></script>