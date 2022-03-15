

<?php
    include_once 'dbh.inc.php';
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userUid = $_POST['uid'];
        $password = $_POST['password'];
        $rPassword = $_POST['pwdrepeat'];

        include_once 'functions.inc.php';

          
        if( emptyInput(array($name, $email, $userUid, $password, $rPassword)) !== true){
            if(invalidUid($userUid) !== false ){
                header('location: ../signup.php?error=invalidUid');
                exit();
            }
            if(invalidEmail($email) !== false){
                header('location: ../signup.php?error=invalidEmail');
                exit();
            }
            if(pswMatch($password, $rPassword) !== false ){
                header('location: ../signup.php?error=passwordNotMatch');
                exit();
            }
            if(uidExists($con, $name, $email) !== false){
                header('location: ../signup.php?error=uidExists');
                exit();
            }
             createUser($con, $name, $email, $userUid, $password);
            // if($password !== $rPassword){
            //     $_SESSION['error'] = 'Password not much';
            //     header('location: ../signup.php');
            //     exit();
            // }
            // else {
            //     if($result = mysqli_query($con, "SELECT `userUid` FROM `users` where `userUid` = '$userUid'  ")){

            //         if(mysqli_num_rows($result) > 0 ){
            //             $_SESSION['error'] = 'username  define  earlier';
            //             mysqli_free_result($result);
            //             header('location: ../signup.php');
            //         }
            //         else{
            //             $query = "INSERT INTO `users`( `userName`, `userEmail`, `userUid`, `userPws`) VALUES ('$name', '$email', '$userUid', '$password' )";
            //             if(mysqli_query($con, $query)){
            //                 $_SESSION['success'] = 'the user has been add';
            //                 header('location: ../login.php');
            //             }
            //         }
            //     };
                
            // }

        }
        else {
            $_SESSION['error'] = 'Enter All field';
            header('location: ../signup.php?error=emptyInputs');
            exit();
        }
        
    }
    else {
        header('location: ../signup.php');
    }