<?php
error_reporting(0);
if (isset($_POST['rp'])) {
    $email = $_POST['e'];
    $fmn = $_POST['fmn'];
    $mobile = $_POST['m'];
    $newp = $_POST['np'];
    $conp = $_POST['cp'];
    /*$num=rand(99,999);
    $rpass=md5($num);
    $x=substr($rpass,5,5);
    echo $x;*/
    //mail($email,"subj:password recorver",$x,"From:abc.com");

    if (file_exists("User_Data/$email")) {

        if (file_exists("User_Data/$email/$fmn") && file_exists("User_Data/$email/$mobile")) {
            if ($newp == $conp) {
                //$fo=fopen("User_Data/$email/");
                $op = opendir("User_Data/$email/password/");
                $r = readdir("$op");
                echo $r;
                rename("User_Data/$email/$r", "User_Data/$email/$newp");
                echo "<div class=\"notificationx alert alert-success\" role=\"alert\">
						<span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span>
						<span class=\"sr-only\">Success:</span>Password Successfully Reset</div>";
            } else {
                echo "<div class=\"notification1 alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>Passwords do not match!</div>";
            }
        } else {
            echo "<div class=\"notification2 alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>Phone numbers do not match!</div>";
        }
    } else {
        echo "<div class=\"notification3 alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>We do not recognize that email id</div>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Mail|Forgot password</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="info row" align="center">
    <ul class="brandText" id="brandName">
        <li class="brand text">Forgot your password?<br/></li>
        <li class="brand text">
            <small>Don't worry, we've got you covered!</small>
        </li>
    </ul>
</div>

<div class="login">
    <h2 class="forgot">Recover Password</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-user form-control-feedback"></i>
            <input class="form-control" type="email" placeholder="Type your email" name="e"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-phone-alt form-control-feedback"></i>
            <input class="form-control" type="text" placeholder="Phone number" name="fmn"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-phone-alt form-control-feedback"></i>
            <input class="form-control" type="text" placeholder="Confirm phone number" name="m"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-lock form-control-feedback"></i>
            <input class="form-control" type="password" placeholder="Enter new password" name="np"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-lock form-control-feedback"></i>
            <input class="form-control" type="password" placeholder="Confirm new password" name="cp"/>
        </div>
        <input class="btn btn-default" type="submit" value="Reset Password" name="rp">
        <div class="sign-in">
            <span>Already have an account?&nbsp</span><a href="index.php">Sign in here</a>
        </div>
    </form>
</div>

</body>
</html>
