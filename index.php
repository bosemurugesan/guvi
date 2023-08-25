<?php
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $myusername = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['pswd']);

    $sql = "SELECT * FROM userdetails WHERE email = '$myusername' and pswd = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['login_userdetails'] = $myusername;

        echo "<script>alert('Login Successful');window.location.href='next.php';</script>";
        
    } else {
        echo "<script>alert('Your Login E-mail or Password is invalid');window.location.href='index.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Guvi</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form id="reg" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <div class="input_box">
                    <i class="uil uil-user user"></i>
                    <input type="text" name="uname" placeholder=" User Name" required="">
                </div>
                <div class="input_box">
                    <input type="email" name="email" placeholder=" Email" required="">
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <i class="uil uil-lock password pw_toggle" ></i>
                    <i class="uil uil-eye-slash pw_t"></i>
                </div>

                <div class="input_box">
                    <input type="password" name="pswd1" placeholder="Conform Password" required="">
                    <i class="uil uil-lock password pw_toggle"></i>
                    <i class="uil uil-eye-slash pw_t"></i>
                </div>

                <br>
                <button type="submit" id="register" value="Register">Sign Up</button>
            </form>
        </div>
        <!-- Signup From -->
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <div class="input_box">
                    <input type="email" name="email" placeholder=" Email" required="">
                    <i class="uil uil-envelope-alt email"></i>
                </div>
                <div class="input_box">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <i class="uil uil-lock password pw_toggle"></i>
                    <i class="uil uil-eye-slash pw_t"></i>
                </div>

                <br>
                <span class="checkbox">
                    <input type="checkbox" id="check" />
                    <label for="check">Remember me</label>
                </span>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="login" id="login" value="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please with your personal info</p>
                    <button class="ghost" type="submit" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" type="submit" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="overlap.js"> </script>
    <script src="Signin_Signup_Script.js"> </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#reg', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_reg", true);
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    } else if (res.status == 200) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#userdetails').load(location.href + " #userdetails");
                    } else if (res.status == 500) {
                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });
        });
    </script>
</body>
</html>