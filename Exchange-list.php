<?php
 include('connection.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Blood List</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        td{
            width:200px ;
            height: 20px;
        }
        #form1{
            width: 80%;
            height: 300px;
            background-color: red;
            color: white;
            border-radius: 10px;
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
            <h3>Exchange Blood List</h3>
            <center><div id="form1">
                <table>
                    <tr>
                        <td><center><b><font color="blue">First Name</font></b></center> </td>
                        <td><center><b><font color="blue">Last Name</font></b></center> </td>
                        <td><center><b><font color="blue">Address</font></b></center> </td>
                        <td><center><b><font color="blue">City</font></b></center> </td>
                        <td><center><b><font color="blue">Age</font></b></center> </td>
                        <td><center><b><font color="blue">Blood Type</font></b></center> </td>
                        <td><center><b><font color="blue">Exchange Blood Group</font></b></center> </td>
                        <td><center><b><font color="blue">Phone number</font></b></center> </td>
                        
                    </tr>
                    <?php
                    $q=$db->query("SELECT * FROM exchange_b");
                    while($r1=$q->fetch(PDO::FETCH_OBJ))
                    {
                        ?>
                        <tr>
                        <td><center><?= $r1->name; ?></center></td>
                        <td><center><?= $r1->Fname; ?></center></td>
                        <td><center><?= $r1->address; ?></center></td>
                        <td><center><?= $r1->city; ?></center></td>
                        <td><center><?= $r1->age; ?></center></td>
                        <td><center><?= $r1->bgroup; ?></center></td>
                        <td><center><?= $r1->exbgroup;?></center></td>
                        <td><center><?= $r1->mno?></center></td>
                        </tr>

                        <?php
                    }
                    ?>
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