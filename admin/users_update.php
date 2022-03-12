
<title>AMMUNATION: Users</title>
<?php require_once("../modules/header.php");
        require_once("../modules/sql.php");?>
<main class="home_content flex-column-center">
    <h1>Edit product data <i class="bx bxs-star"></i></h1>
    <section class="product-details">
            <?php
                if(isset($_GET["id"])){

                    $_GET["id"] = $con->real_escape_string($_GET["id"]);
                    
                    echo "<form method='POST' action='users_edit_process.php?id=".$_GET['id']."'>
                            <table>";

                    $query = "SELECT * FROM empleados WHERE id='". $_GET["id"] . "'";
    
                    $result = $con->query($query);
    
                    while($row = $result->fetch_assoc()){
                        echo
                            "
                            <tr>
                                <th><h2>Username: </h2></th>
                                <td><input name='username' type='text' value='". $row["usuario"] ."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Password: </h2></td>
                                <td><input name='password' type='password' value='".$row["pass"]."'/></td>
                            </tr>
                            <tr>
                                <td><h2>Admin: </h2></td>
                                <td>
                                    <select name='admin'>
                                        <option value='1'"; if ($row["isadmin"]) echo "selected"; echo ">Yes</option>
                                        <option value='0'"; if(!$row["isadmin"]) echo "selected"; echo ">No</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'><input name='confirm_c_edit' class='links' type='submit' value='Confirm'></td>
                            </tr>
                        </table>
                    </form>";
                    } 
                } else {
            ?>
            <form method='POST' action='users_edit_process.php'>
                <table>
                <tr>
                    <th><h2>Username: </h2></th>
                    <td><input name='username' type='text'/></td>
                </tr>
                <tr>
                    <td><h2>Password: </h2></td>
                    <td><input name='password' type='password'/></td>
                </tr>
                <tr>
                    <td><h2>Admin: </h2></td>
                    <td>
                        <select name='admin'>
                            <option value='1'>Yes</option>
                            <option value='0'>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'><input name='confirm_c_add' class='links' type='submit' value='Confirm'></td>
                </tr>
            </table>
        </form>
        <?php }?>
    </section>
</main>
</body>
</html>