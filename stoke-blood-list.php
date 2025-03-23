<?php
 include('connection.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stoke Blood List</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        td{
            width:200px ;
            height: 20px;
        }
       

    </style>
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
            <h1>Stoke Blood List</h1>
            <center><div id="form">
                <table>
                    <tr>
                        <td><center><b><font color="blue">Name</font></b></center> </td>
                        <td><center><b><font color="blue">Qty</font></b></center> </td>
                    </tr>
                        <tr>
                        <td><center>O+</center></td>
                        <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='o+'");
                            echo $row=$q->rowCount();
                            ?>
                        </center></td>
                    </tr> 
                    </tr>
                        <tr>
                        <td><center>O-</center></td>
                        <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='o+'");
                            echo $row=$q->rowCount();
                            ?>
                        </center></td>
                    </tr> 
                    <tr>
                        <td><center>A+</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr> 
                    <tr>
                        <td><center>A-</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr> 
                    <tr>
                        <td><center>B+</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr>
                    <tr>
                        <td><center>B-</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr>  
                    <tr>
                        <td><center>AB+</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr> 
                    <tr>
                        <td><center>AB-</center></td>
                        <td><center>
                                <?php
                                $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                echo $row=$q->rowCount();
                                ?>
                        </center></td>
                    </tr>     
                </table>
            </div></center>
        </div>
        <div id="footer">
            <h4 align="center">Copyright@BY STUDENTS</h4>
            <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>

        </div>

    </div>
</div>
</body>
</html>