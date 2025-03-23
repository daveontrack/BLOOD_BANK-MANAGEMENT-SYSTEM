<?php
 include('connection.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration</title>
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
            <h1>Donor Registration</h1>
            <center><div id="form">
                <form action="" method="post">
                <table>
                    <tr>
                        <td width="200px" height="50px">Enter First Name</td>
                        <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter your Name"></td>
                        <td width="200px" height="50px">Enter Last Name</td>
                        <td width="200px" height="50px"><input type="text" name="Fname" placeholder="Enter your Last Name"></td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter Address</td>
                        <td width="200px" height="50px"><textarea name="address"></textarea></td>
                        <td width="200px" height="50px">Enter City</td>
                        <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter your city "></td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter your Age</td>
                        <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter your Age"></td>
                        <td width="200px" height="50px">Select your Blood Type</td>
                        <td width="200px" height="50px">
                            <select name="bgroup" required>
                                <option>O+</option>
                                <option>O-</option>
                                <option>A+</option>
                                <option>A+</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200px" height="50px">Enter your Email</td>
                        <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter your email "></td>
                        <td width="200px" height="50px">Enter your Phone number</td>
                        <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter your Phone number "></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="sub" value="Save"></td>
                    </tr>
                </table>
                </form>
                <?php
                if(isset($_POST['sub']))
                {
                    $name=$_POST['name'];
                    $Fname=$_POST['Fname'];
                    $address=$_POST['address'];
                    $city=$_POST['city'];
                    $age=$_POST['age'];
                    $bgroup=$_POST['bgroup'];
                    $mno=$_POST['mno'];
                    $email=$_POST['email'];
                    $q=$db->prepare("INSERT INTO donor_registration(name,Fname,address,city,age,bgroup,mno,email) VALUES(:name,:Fname,:address,:city,:age,:bgroup,:mno,:email)");
                    $q->bindValue(':name',$name);
                    $q->bindValue(':Fname',$Fname);
                    $q->bindValue(':address',$address);
                    $q->bindValue(':city',$city);
                    $q->bindValue(':age',$age);
                    $q->bindValue(':bgroup',$bgroup);
                    $q->bindValue(':mno',$mno);
                    $q->bindValue(':email',$email);

                    if($q->execute())
                    {
                        echo "<script>alert('Donor Registration Successfully')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Donor Registration Fail')</script>";
                    }
                }
                ?>
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