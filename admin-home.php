<?php
 include('connection.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<div>

<div id="full">
    <div id="inner_full">
        <div id="header"><h2 ><a href="admin-home.php" style="text-decoration:none;color:white;">Blood Donation Bank Management System </a></h2></div>
        <div id="body">
            <br>
            <?php
           // $un=$_SESSION['un'];
            //if(!$un)
            {
                //header("location:index.php");

            }
            ?>
            <h1>Welcome Admin</h1><br>
            <ul>
                <li><a href="donor-red.php">Donor Registration</a></li>
                <li><a href="donor-list.php">Donor List</a></li>
                <li><a href="stoke-blood-list.php">Stoke Blood List</a></li>
            </ul>
            <br><br><br><br>
            <ul>
                <li><a href="out-stoke-blood-list.php">Out Stroke Blood List</li>
                <li><a href="exchange-blood-list.php">Exchange Blood Donor Registration</a></li>
                <li><a href="Exchange-list.php">Exchange Blood List</a></li>
            </ul>
            
        </div>
        <div id="footer">
    <h4 align="center">Copyright@BY STUDENTS</h4>
    <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>

</div>

    </div>
</div>
</body>
</html>