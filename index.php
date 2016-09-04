<!-- TRY TO POST YOUR MAJOR PHP CODES ABOVE YOUR HTML CODES SUCH AS THE ONE YOU DID BELOW SHOULD BE PLACED  BELOW SESSION START...I WILL COMMENT ON IT AND MAKE CHANGES TO SHOW YOU WHY -->
<?php session_start(); ?>
<?php
    if (isset($_POST['l'])) {
        $email = $_POST['e']; // PLEASE DONT USE LETTERS OR WORDS WITH NO MEANING TO REPRESENT THIS , YOU WILL WORK WITH PEOPLE AND "email" instead of "e" will make it easier to undersand at first glance
        $pass = $_POST['p'];
        if (file_exists("User_Data/$email") && file_exists("User_Data/{$email}/{$pass}")) { // i tink there should be curly brackets around the variables in double quote like {$var} . itz more noticeable at least.
            $_SESSION['user'] = $email;
            //header('location:email.php'); // HEHE ...the reason this header didn't work is because you displayed the html before it was processed.Always
            								//remember to post your processing codes above or better still, create PHP classes.
            								//NB: EVEN THE COMMENT I PLACED ABOVE OR EVEN A SPACE SHOULDNT BE BEFOR YOUR PROCESSING PHP CODE.
            echo "<script>window.location='email.php'</script>"; //of course you know this will not work if javascript is not available.
        } else {


        	//wrapping this with single quotes prevents the need to escape the double quotes inside with slashes
            /*echo "<div class=\"notification alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>We do not recognize those log-in details. Please try again</div>";*/
       


                    echo '<div class="notification alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>We do not recognize those log-in details. Please try again</div>';

        }

    }
    @$ot = $_GET['fpassw'];
    echo $ot;
    switch ($ot) { //lol..wat is ot?
        case 'fpass';
            include('forgotpass.php');
            break;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="images/mail.png">
    <title>M@il Beta Version</title>
   <!--  	THIS IS THE CODE THAT SHOULD BE ABOVE SINCE THE OUTCOME OF WHAT THE PAGE WILL BE LIKE OR GO TO DEPENDS ON IT...DISPLAYING THE PAGE BEFORE IT STARTS ITZ WORK WILL LEAD TO ERROR BECAUSE HEADER WOULD ALREADY HAVE BEEN CALLED BEFORE IT CAN REDIRECT(there is a workaround tho but better keep php above)
    if (isset($_POST['l'])) {
        $email = $_POST['e'];
        $pass = $_POST['p'];
        if (file_exists("User_Data/$email") && file_exists("User_Data/$email/$pass")) {
            $_SESSION['user'] = $email;
            //header('location:email.php');
            echo "<script>window.location='email.php'</script>";
        } else {
            echo "<div class=\"notification alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>We do not recognize those log-in details. Please try again</div>";
        }

    }
    @$ot = $_GET['fpassw'];
    echo $ot;
    switch ($ot) {
        case 'fpass';
            include('forgotpass.php');
            break;
    }
     -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="/js/jQuery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/js/reg_control.js"></script>
     <script>

   // alert("john");
    </script>

</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <ul id="brandName">
                    <li class="brand">m</li>
                    <li class="brand"><img id="logo" src="images/mail.png"></li>
                    <li class="brand">il</li>
                </ul>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a class="navigator" href="index.php?option=about">About Us</a>
                </li>
                <li>
                    <a class="navigator" href="index.php?option=service">Services</a>
                </li>
                <li>
                    <a class="navigator" href="index.php?option=contact">Contact Us</a>
                </li>
                <li>
                    <a class="navigator" href="index.php?option=feedback">Feedback</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <?php
  	 // @$opt = $_GET['option'];
    if(isset($_GET['option'])){
    	$opt = $_GET['option'];
    }else{
    	$opt = null;
    }
    //echo $opt;
    if (is_null($opt)) {
        ?>
        <div class="info row" align="center">
            <ul class="brandText" id="brandName">
                <li class="brand text">m</li>
                <li class="brand text"><img alt="a" id="logoText" src="images/mail.png"></li>
                <li class="brand text">il
                    <small>is a quick and easy-to-use email client</small>
                </li>
            </ul>
        </div>

        <div class="login">
            <h2>Sign in</h2> <!-- action is for security-->
            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] , ENT_QUOTES , 'utf-8');?>"> <!-- WOW!!!...I JUST LEARNT THIS FROM YOU NOW.. I NEVA TRY TO CHECK FOR ILLEGALITIES IN PHP_SELF -->
                <div class="form-group has-feedback">
                    <i class="glyphicon glyphicon-user form-control-feedback"></i>
                    <input class="form-control" type="email" placeholder="Type your email" name="e" required/>
                </div>
                <div class="form-group has-feedback">
                    <i class="glyphicon glyphicon-lock form-control-feedback"></i>
                    <input class="form-control" type="password" placeholder="Password" name="p" required/>
                </div>
                <input class="btn btn-default" type="submit" value="Sign in" name="l"/>
                <a class="forgotPass" href="index.php?option=fpass">Forgot Password</a>
                <div class="sign-up">
                    <span>New here?&nbsp</span><a href="index.php?option=registration">Create a new account!</a>
                </div>
            </form>
        </div>
        <br/>
        <?php
    } else {
        switch ($opt) {
            case 'about';
                include('new_about.php'); //ur former about wasn't saved in UTF-8 and made the browser spit it out as regular text
                echo '<b>hello</b>';
                break;
            case 'service';
                include('services.php');
                break;
            case 'registration';
                include('register.php');
                break;
            case 'contact';
                include('contact.php');
                break;
            case 'feedback';
                include('feedback.php');
                break;
            case 'fpass';
                include('forgotpass.php');
                break;
        }
    }
    ?>
</section>


<!-- Footer -->
<footer>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <a name="social" class="social">
                <ul class="social">
                    <li class="copyright">Copyright &copy; Boymexii & TT (2016)</li>
                </ul>
            </a>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</body>
</html>
