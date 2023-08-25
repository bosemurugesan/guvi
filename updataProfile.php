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
$countries = array(
    "United States",
    "Canada",
    "United Kingdom",
    "India"
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time() ?>">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="top">
    <nav class="navbar navbar-light bg-light fixed-top" id="sidenav">
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
                            <a class="dropdown-item" aria-current="page" href="updataProfile.php" style="color: black;" data-bs-toggle="modal" data-bs-target="#profileModal">Update Profile</a>
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
    </nav><br><br>
    <div class="main">
        <div id="errorMessage" class="alert alert-warning d-none"></div>
        <form id="reg" class="mx-auto col-20 col-md-20 col-lg-10">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="main1">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" style="margin-top: 100px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTinNX2sTnZ0ct5o1V_8PsKIaQXFKUZBz6f0g&usqp=CAU">
                                        <div class="d-flex justify-content-center"><br><br><br><br><br><br>
                                            <div class="btn btn-primary btn-rounded" id="img">
                                                <label class="form-label text-white m-1" for="customFile2">Upload your image</label>
                                                <input type="file" class="form-control d-none" id="customFile2" name="uploadfile" value="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-40"><label class="labels">First Name</label><input type="text" class="form-control " name="FNAME" value="<?php echo $firstName; ?>" required></div>
                                    <div class="col-md-40"><label class="labels">Last Name</label><input type="text" class="form-control " name="LNAME" value="<?php echo $lastName; ?>" required></div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-40"><label class="labels">Date of Birth</label><input type="date" class="form-control" name="DOB" value="<?php echo $dob; ?>" required></div>
                                    <div class="col-md-40"><label class="labels mt-3">Gender</label>
                                        <select name="GENDER" class="form-control" required>
                                            <option value="">Select Option</option>
                                            <option value="Male" <?php if ($gender === 'Male') echo 'selected="selected"'; ?>>Male</option>
                                            <option value="Female" <?php if ($gender === 'Female') echo 'selected="selected"'; ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-40"><label class="labels mt-3">Mobile Number</label><input type="text" class="form-control" name="MOBILE" value="<?php echo $mobile; ?>" required style="margin-right: 40px;"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Address Line 1</label><input type="text" class="form-control" name="ADDRESS" value="<?php echo $address; ?>" required></div>
                                    <div class="col-md-40"><label class="labels mt-3">Area</label><input type="text" class="form-control" name="AREA" value="<?php echo $area; ?>"></div>
                                    <div class="col-md-40"><label class="labels mt-3">Postcode</label><input type="text" class="form-control" name="PINCODE" value="<?php echo $pincode; ?>" required></div>
                                    <div class="col-md-40"><label class="labels mt-3">State</label><input type="text" class="form-control" name="STATE" value="<?php echo $state; ?>" required></div>
                                    <div class="col-md-40">
                                        <label class="labels mt-3">Country</label>
                                        <select name="COUNTRY" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <?php
                                            foreach ($countries as $countryOption) {
                                                $selected = ($country === $countryOption) ? "selected" : "";
                                                echo "<option value=\"$countryOption\" $selected>$countryOption</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" href="#top" type="submit">Save Profile</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

</body>

</html>