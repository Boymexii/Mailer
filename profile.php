<?php
session_start();
$user = $_SESSION['user'];
if ($_SESSION['user'] == "") {
    header('location:index.php');
} else {
    error_reporting(0);
    $pExt = array('jpg', 'png', 'jpeg', 'bmp', 'gif');
    $sc = opendir("User_Data/$user");
    while ($file = readdir($sc)) {
        if ($file != '.' && $file != '..') {
            $filedata = pathinfo($file);
            if (in_array($filedata['extension'], $pExt)) {
                $img = $filedata['basename'];
                //print_r($filedata);
            }

        }
    }
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
              rel="stylesheet" type="text/css">
        <title>My Page</title>
        <style type="text/css">
            body {
                margin-top: -2px
            }

            table {
                margin: auto
            }

            td {
                border: 1px solid red;
                padding: 1px
            }

            a {
                border-radius: 8px;
                text-decoration: none;
                margin-left: 2%;
                font-size: 16px
            }

            a:hover {
                color: #00FF00;
                background: #CC0066
            }

            img {
                margin-top: -1px;
                margin-bottom: -5px
            }

            p {
                color: #660066;
                font-size: 22px;
                font-weight: bold;
                font-style: italic;
                margin-top: -2px
            }
        </style>
    </head>
    <body style="font-family: Lato;">
    <table width="100%" height="100%" border="1">
        <tr style="background-color:#660066">
            <td height="30" colspan="3">
                <span style="color:#FFFF00">Welcome <?php echo @$_SESSION['user']; ?></span>
                <span style="margin-left:55%"><a href="email.php" style="color:#FF0000">Home</a></span>
                <span><a href="profile.php?option=pro" style="color:#FF0000">Profile</a></span>
                <span><a href="profile.php?option=set" style="color:#FF0000">Setting</a></span>
                <span><a href="logout.php" style="color:#FF0000">Logout</a></span>

            </td>
        </tr>
        <tr>
            <td height="254" colspan="3" style="background-color:#CCCCCC">
                <span><?php echo "<img src='User_Data/$user/$img' height='119px'/>"; ?></span>
	<span style="margin-left:46%"><a href="profile.php?option=edit">Edit_Profile</a>
	<a href="profile.php?option=pass">Change_Password</a>
	<a href="profile.php?option=thems">Change_Themes</a>
	<a href="profile.php?option=admin">Admin</a>	</span></td>
        </tr>
        <tr>
            <td width="101" align="center" valign="top" style="background-color:#66FFCC;padding:10px">
                <a href="profile.php?option=compose">COMPOSE</a><br/>
                <a href="profile.php?option=inbox">INBOX</a><br/>
                <a href="profile.php?option=sent">SENT</a><br/>
                <a href="profile.php?option=draft">DRAFT</a><br/>
                <a href="profile.php?option=spam">SPAM</a> <br/>
                <a href="profile.php?option=trash">TRASH</a><br/>
            </td>
            <td width="740" height="428" valign="top">
                <?php
                @$opt = $_GET['option'];
                switch ($opt) {
                    case 'edit';
                        include('edit_profile.php.php');
                        break;
                    case 'pass';
                        include('change_pass.php');
                        break;
                    case 'Thems';
                        include('change_thems.php');
                        break;
                    case 'admin';
                        include('admin.php');
                        break;
                    case 'compose';
                        include('compose.php');
                        break;
                    case 'inbox';
                        include('inbox.php');
                        break;
                    case 'sent';
                        include('sent.php');
                        break;
                    case 'draft';
                        include('draft.php');
                        break;
                    case 'spam';
                        include('spam.php');
                        break;
                    case 'trash';
                        include('trash.php');
                        break;
                    case 'set';
                        include('setting.php');
                        break;
                }
                ?>    </td>
            <td width="229" valign="top">
                <p>Contacts List
                <p>

            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">Doveloped By Boymexii</td>
        </tr>
    </table>
    </body>
    </html>
    <?php
}
?>
