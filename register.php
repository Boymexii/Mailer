<?php
    
    $name = '';
    $email = '';
    $password = '';



    if (isset($_POST['save'])) {

        $errorPresent = false;
        $errorMessage = '';
        $compulsoryFields = ['name' , 'email' , 'password' , 'number'];


        foreach ($compulsoryFields as $compulsoryField) {
             if(empty(trim($_POST[$compulsoryField]))){
                $errorMessage .= "<li> {$compulsoryField} is compulsory </li>"; // this is another reason why proper naming can make things easier.
                $errorPresent = true;
             }
        }

        if($_POST['number'] != $_POST['confirmNumber']){
             $errorMessage .= "<li> phone number doesn't match</li>";
             $errorPresent = true; 
        }


        if($errorPresent){

            restoreDetails();
            displayErrorMessage($errorMessage);

        }else{

            createUserFiles();
        }
       
        
       
    }

    /*
        restores the user's previous data when error occurs .. they will be echoed in the form below
    */
    function restoreDetails(){

         global $name , $email , $password;

         $name = $_POST['name'];
         $email = $_POST['email'];
         $password = $_POST['password'];
    }


    function displayErrorMessage($errorMessage){

         echo "<div class=\"notification alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span><ul>{$errorMessage}</ul></div>";
    }


    function createUserFiles(){

        $n = $_POST['name'];
        $e = $_POST['email'];
        $p = $_POST['password'];
        $m = $_POST['number'];
        $a = $_POST['address'];
        $ff = $_POST['confirmNumber'];

         if (file_exists('User_Data/$e')) {
            echo "<div class=\"notification alert alert-danger\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Error:</span>It seems you're already signed up! Log in <a href='index.php'>here</a></div>";
        } else {
            mkdir("User_Data/$e");
            mkdir("User_Data/$e/inbox");
            mkdir("User_Data/$e/sent");
            mkdir("User_Data/$e/draft");
            mkdir("User_Data/$e/spam");
            mkdir("User_Data/$e/trash");
            //mkdir("User_Data/$e/password");
            move_uploaded_file($_FILES['img']['tmp_name'], "User_Data/$e/" . $_FILES['img']['name']);
            //echo $_FILES['img']['name'];
            $fo = fopen("User_Data/$e/$p", "w");
            $fo1 = fopen("User_Data/$e/profile", "w");
            $fm = fopen("User_Data/$e/$m", "w");
            $mm = fopen("User_Data/$e/$ff", "w");
            fwrite($fo1, "Name:$n  Email:$e Password:$p Mobile:$m Address:$a");
            echo "<div class=\"notification alert alert-success\" role=\"alert\">
                    <span class=\"glyphicon glyphicon-thumbs-up\" aria-hidden=\"true\"></span>
                    <span class=\"sr-only\">Success:</span>Congrats to you! You have been successfully registered!</div>";
        }
    }

    ?>


<!-- REMOVED THE HTML HEAD CODE HERE...IF YOU CHECK YOUR SOURCE CODE FROM THE BROWSER, YOU SHOULD NOTICE THAT IT GIVES SOME ERRORS-->
<div class="info row" align="center">
    <ul class="brandText" id="brandName">
        <li class="brand text">Registration time!<br/></li>
        <li class="brand text">
            <small>You're now one step away from using the fastest email client on the planet!</small>
        </li>
    </ul>
</div>

<div class="login">
    <h2 >Register</h2>
    <form  id="reg_form" method="post" enctype="multipart/form-data"> <!-- given an ID of reg_form that will be used in reg_control.js to handle form -->
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-user form-control-feedback"></i>
        <input class="form-control" type="text" placeholder="Enter Your Name" id='name' name="name" value='<?php echo $name ?>' required><!-- Setting this to required makes it compulsory but that is not the best and recommended step cuz its the easiest to remove  ....Lets try the second way(i no get strenght to do d second again :-D itz with javascriptz jquery, u fit do am na..OK DID LITTLE B4 sending ) befor the final and strongest way to make it-->
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-send form-control-feedback"></i>
            <input class="form-control" type="email" placeholder="Email address" id='email' name="email" value='<?php echo $email ?>'/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-lock form-control-feedback"></i>
            <input class="form-control" type="password" placeholder="Preferred password" name="password" value='<?php echo $password ?>'/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-phone-alt form-control-feedback"></i>
            <input class="form-control" type="text" placeholder="Phone number" name="number"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-phone-alt form-control-feedback"></i>
            <input class="form-control" type="text" placeholder="Confirm phone number" name="confirmNumber"/>
        </div>
        <div class="form-group has-feedback">
            <i class="glyphicon glyphicon-home form-control-feedback"></i>
        <input class="form-control" type="text" placeholder="Enter your address" name="address"/>
            </div>

        <div class="upload">&nbsp&nbsp&nbsp<i class="glyphicon glyphicon-cloud-upload"></i>&nbsp&nbspUpload&nbsp&nbsp&nbsp<input type="file" value="" name="img"/></div><!-- I dont recommend making formating using &nbsp;  instead use css  with margin-right and left ... N/B remember to put semi-colon(;) after &nbsp-->
<div class="buttons"><input class="btn btn-default" type="submit" value="Register" name="save">
    <input class="btn btn-default" type="submit" value="Erase" name="rp"></div>
    </form>
</div>
<!-- removed HTML -->