<?php 
include("config.php");
session_start();
if(isset($_POST['save_reg']))
{
    $email = $_SESSION['login_userdetails'];
    $firstName = mysqli_real_escape_string($db, $_POST['FNAME']);
    $lastName = mysqli_real_escape_string($db, $_POST['LNAME']);
    $dob = mysqli_real_escape_string($db, $_POST['DOB']);
    $gen = mysqli_real_escape_string($db, $_POST['GENDER']);
    $mobile = mysqli_real_escape_string($db, $_POST['MOBILE']);
    $ad1 = mysqli_real_escape_string($db, $_POST['ADDRESS']);
    $area = mysqli_real_escape_string($db, $_POST['AREA']);
    $pc = mysqli_real_escape_string($db, $_POST['PINCODE']);
    $st = mysqli_real_escape_string($db, $_POST['STATE']);
    $con = mysqli_real_escape_string($db, $_POST['COUNTRY']);

    $query = "UPDATE userdetails 
              SET FNAME = '$firstName', LNAME = '$lastName', DOB = '$dob',GENDER = '$gen',MOBILE='$mobile',ADDRESS='$ad1',AREA='$area',PINCODE='$pc',STATE='$st',COUNTRY='$con'
              WHERE email = '$email'";
            
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Profile Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Profile Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}
?>
