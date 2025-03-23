<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Blood Donor Registration</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        td {
            width: 200px;
            height: 20px;
            padding: 6px;
        }
        #form2{
            width: 80%;
            height: 300px;
            background-color: red;
            color: white;
            border-radius: 10px;
            }
    </style>
</head>
<body>
<div id="full">
    <div id="inner_full">
        <div id="header">
            <h2><a href="admin-home.php" style="text-decoration:none;color:white;">Blood Donation Bank Management System</a></h2>
        </div>
        <div id="body">
            <br>
            <h3>Exchange Blood Donor Registration</h3>
            <center>
                <div id="form2">
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>Enter First Name</td>
                                <td><input type="text" name="name" placeholder="Enter your Name"></td>
                                <td>Enter Last Name</td>
                                <td><input type="text" name="Fname" placeholder="Enter your Last Name"></td>
                            </tr>
                            <tr>
                                <td>Enter Address</td>
                                <td><textarea name="address"></textarea></td>
                                <td>Enter City</td>
                                <td><input type="text" name="city" placeholder="Enter your city"></td>
                            </tr>
                            <tr>
                                <td>Enter your Age</td>
                                <td><input type="number" name="age" placeholder="Enter your Age"></td>
                                <td>Enter your Email</td>
                                <td><input type="email" name="email" placeholder="Enter your email"></td>
                            </tr>
                            <tr>
                                <td>Enter your Phone number</td>
                                <td><input type="tel" name="mno" placeholder="Enter your Phone number"></td>
                            </tr>
                            <tr>
                                <td>Select your Blood Type</td>
                                <td>
                                    <select name="bgroup" >
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                    </select>
                                </td>
                                <td>Exchange Blood Group</td>
                                <td>
                                    <select name="exbgroup" >
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="sub" value="Save"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if(isset($_POST['sub'])) {
                        $name = $_POST['name'];
                        $Fname = $_POST['Fname'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];
                        $age = $_POST['age'];
                        $bgroup = $_POST['bgroup'];
                        $mno = $_POST['mno'];
                        $email = $_POST['email'];
                        $exbgroup = $_POST['exbgroup'];

                      $q = "SELECT * FROM donor_registration WHERE bgroup = '$bgroup'";
                      $st = $db->query($q);
                      $num_row=$st->fetch();
                      //print_r($num_row['name']);
                      //  $st->execute();
                     //$num_row = $st->fetch();
                    $id = $num_row['id'];
                    $name = $num_row['name'];
                    $b1 = $num_row['bgroup'];
                    $mno = $num_row['mno'];

                    $q1 = "INSERT INTO out_stoke_bb (bname, name, mno) VALUES (?, ?, ?)";
                    $st1 = $db->prepare($q1);  
                    $st1->execute([$b1, $name, $mno]);
                    
                       // $st1->execute([$b1, $name, $mno]);

                    $q2 = "DELETE FROM donor_registration WHERE id = '$id'";
                    $st1 = $db->prepare($q2);
                    $st1->execute();

                        $q = $db->prepare("INSERT INTO exchange_b(name, Fname, address, city, age, bgroup, mno, email, exbgroup) VALUES(:name, :Fname, :address, :city, :age, :bgroup, :mno, :email, :exbgroup)");
                        $q->bindValue(':name', $name);
                        $q->bindValue(':Fname', $Fname);
                        $q->bindValue(':address', $address);
                        $q->bindValue(':city', $city);
                        $q->bindValue(':age', $age);
                        $q->bindValue(':bgroup', $bgroup);
                        $q->bindValue(':mno', $mno);
                        $q->bindValue(':email', $email);
                        $q->bindValue(':exbgroup', $exbgroup);


                         if ($q->execute()) {
                            echo "<script>alert('Registration Successfully')</script>";
                        } else {
                            echo "<script>alert('Registration Failed')</script>";
                        }


/*
                        // Select donor data
                            $q = "SELECT * FROM donor_registration WHERE bgroup = :bgroup";
                            $st = $db->prepare($q);
                            $st->execute([':bgroup' => $bgroup]);
                            $num_row = $st->fetch(PDO::FETCH_ASSOC);

                            if ($num_row) {
                                // Assign donor details
                                $id = $num_row['id'];
                                $name = $num_row['name'];
                                $b1 = $num_row['bgroup'];
                                $mno = $num_row['mno'];

                                // Insert into out_stoke_bb
                                $q1 = "INSERT INTO out_stoke_bb (bname, name, mno) VALUES (?, ?, ?)";
                                $st1 = $db->prepare($q1);
                                $st1->execute([$b1, $name, $mno]);

                                // Delete donor from donor_registration
                                $q2 = "DELETE FROM donor_registration WHERE id = :id";
                                $st2 = $db->prepare($q2);
                                $st2->execute([':id' => $id]);

                                // Insert into exchange_b
                                $q3 = "INSERT INTO exchange_b(name, Fname, address, city, age, bgroup, mno, email, exbgroup) 
                                    VALUES(:name, :Fname, :address, :city, :age, :bgroup, :mno, :email, :exbgroup)";
                                $st3 = $db->prepare($q3);
                                $st3->execute([
                                    ':name' => $name,
                                    ':Fname' => $Fname,
                                    ':address' => $address,
                                    ':city' => $city,
                                    ':age' => $age,
                                    ':bgroup' => $bgroup,
                                    ':mno' => $mno,
                                    ':email' => $email,
                                    ':exbgroup' => $exbgroup
                                ]);

                                echo "<script>alert('Registration Successfully')</script>";
                            } else {
                                echo "<script>alert('Registration Failed')</script>";
                            }

                            */                   
                       }
                    ?>
                </div>
            </center>
        </div>
        <div id="footer">
            <h4>Copyright &copy; BY STUDENTS</h4>
            <p><a href="logout.php" style="color:white;">Logout</a></p>
        </div>
    </div>
</div>
</body>
</html>