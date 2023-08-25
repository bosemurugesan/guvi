<?php
session_start();
include('config.php');
$email = $_SESSION['login_userdetails'];

$query = "SELECT * FROM userdetails WHERE email = '$email'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);

$firstName = $row['FNAME'];
$lastName = $row['LNAME'];
$dob = $row['DOB'];
$gender = $row['GENDER'];
$mobile = $row['MOBILE'];
$address = $row['ADDRESS'];
$area = $row['AREA'];
$pincode = $row['PINCODE'];
$state = $row['STATE'];
$country = $row['COUNTRY'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="dashboardstyle.css">   
</head>
<body>
<nav class="navbar navbar-light bg-light fixed-top" >
        <div class="container-fluid">
            <a class="navbar-brand" style="color: black;" href="#">
                <img src="https://images.g2crowd.com/uploads/product/image/large_detail/large_detail_b2b52bf26a769b861fae19c5f65643cf/guvi.png" alt="" width="32" height="29">
                Guvi
            </a>
            <div class="profile-details">
                <p id="profileNameDisplay"></p>
                <p id="profileEmailDisplay"></p>
            </div>

            <ul class="nav justify-content-end">
                <ul class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" data-bs-target="#profileModal" aria-expanded="false" style="color: grey;">
                        Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li class="nav-item">
                            <a class="dropdown-item"  href="updataProfile.php">Update Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="dashboard.php">Show My Profile</a></li>
                    </ul>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color: grey;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: grey;">Log out</a>
                </li>
            </ul>
        </div>
    </nav><br><br><br><br>
    <!-- Navbar top -->
    <div class="main">
        
        <div class="view" id="div1">
            <h2>IDENTITY</h2>
            <div class="card">
                <div class="card-body">
                    <i class="fa fa-pen fa-xs edit"></i>
                    <table>
                        <tbody>
                            <tr>
                                <td>First Name</td>
                                <td>:</td>
                                <td><?php echo $firstName; ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>:</td>
                                <td><?php echo $lastName; ?></td>
                            </tr>
                            <tr>
                                <td>Date Of Birth</td>
                                <td>:</td>
                                <td><?php echo $dob; ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>:</td>
                                <td><?php echo $gender; ?></td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td>:</td>
                                <td><?php echo $mobile; ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $address; ?></td>
                            </tr>
                            <tr>
                                <td>Area</td>
                                <td>:</td>
                                <td><?php echo $area; ?></td>
                            </tr>
                         
                            <tr>
                                <td>Pin Code</td>
                                <td>:</td>
                                <td><?php echo $pincode; ?></td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>:</td>
                                <td><?php echo $state; ?></td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>:</td>
                                <td><?php echo $country; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>