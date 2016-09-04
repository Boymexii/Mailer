<?php
$user = $_SESSION['user'];
$fo = fopen("User_Data/$user/profile", "r");
while (feof($fo)) {
    $f = fgetc($fo);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <?php
    if (isset($_POST['updt'])) {
        $n = $_POST['n'];
        $e = $_POST['e'];
        $p = $_POST['p'];
        $m = $_POST['m'];
        $a = $_POST['a'];

    }
    ?>

    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body style="font-family: Lato;">
<table class="table-hover" border="0" align="center">
    <caption><h1>Update Your Profile....</h1></caption>
    <form method="post" enctype="multipart/form-data">
        <tr>
            <td colspan="2"><?php ?></td>
        </tr>
        <tr>
            <td>Your Name</td>
            <td><input class="form-control" type="text" value="<?php echo @$f; ?>" name="n"></td>
        </tr>
        <tr>
            <td>Your Password</td>
            <td><input class="form-control" type="password" placeholder="Enter New Password" name="p"></td>
        </tr>
        <tr>
            <td>Your Mobile Number</td>
            <td><input class="form-control" type="text" value="<?php echo @$n ?>" name="m"></td>
        </tr>
        <tr>
            <td>Your Address</td>
            <td><textarea class="form-control" value="<?php echo @$n ?>" name="a"></textarea></td>
        </tr>
        <tr>
            <td>Upload Your Image</td>
            <td><input type="file" value="" name="img"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input class="btn btn-default" style="margin-top: 10px;" type="submit"
                                                  value="Update Profile" name="updt">
            </td>
        </tr>
    </form>
</table>
</body>
</html>