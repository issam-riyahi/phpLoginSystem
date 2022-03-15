
<?php

    $errorMeassge = '' ;
    if(isset($_GET['error'])){
        if($_GET['error'] === 'emptyInputs'){
            $errorMeassge = 'Enter All fields';
        }
        else if($_GET['error'] === 'invalidUid'){
            $errorMeassge = 'Invalid User Name';
        }
        else if($_GET['error'] === 'invalidEmail'){
            $errorMeassge = 'Enter valid Email';
        }
        else if($_GET['error'] === 'passwordNotMatch'){
            $errorMeassge = 'Passwords doesn\'t matchs';
        }
        else if($_GET['error'] === 'uidExists'){
            $errorMeassge = 'Username already exist';
        }
        else if($_GET['error'] === 'stmtfaild'){
            $errorMeassge = 'somethings  wrong try agin';
        }
    }
?>



<?php include 'header.php' ?>



<div class="signup">
    <h2>SingUp</h2>
    <div class="error-message <?php echo  isset($_GET['error']) ? 'active' : '' ?> ">
        <p><?php echo  $errorMeassge ?></p>
    </div>
    <form action="includes/signup.inc.php" method="POST">
        <input type="text" name="name" id="name" placeholder="Full name...">
        <input type="email" name="email" id="email" placeholder="example@gmail.com">
        <input type="text" name="uid" id="uid" placeholder="Username...">
        <input type="password" name="password" id="psw" placeholder="Password">
        <input type="password" name="pwdrepeat" id="rpsw" placeholder="Repeat Password...">
        <button type="submit" id="signup" name="submit">Sing Up</button>
    </form>
    
</div>
<?php include 'footer.php' ?>