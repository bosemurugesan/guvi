<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Home</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    <a class="nav-link" href="#" style="color: grey;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: grey;">Log out</a>
                </li>
            </ul>
        </div>
    </nav><br><br><br><br>
</body>
     
</html>